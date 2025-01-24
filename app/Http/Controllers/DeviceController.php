<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\ActivationCode;
use App\Http\Resources\DeviceResource;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $device = Device::with('activationCode')->where('device_id', $request['deviceId'])->first();

        if ($device->device_type == 'restricted') {
            return response()->json(['error' => 'The device has been suspended'], 400);
        }

        if ($device->device_type == 'leasing' && $request['activationCode'] == null) {
            return response()->json(['error' => 'The device registered with a leasing plan cannot be set to a free account'], 400);
        }

        if ($request['activationCode']) {
            $activationCode = ActivationCode::where('code', $request['activationCode'])->first();
            $activationCodeId = $activationCode->id;

            if ($device->activation_code_id === $activationCodeId) {
                return response()->json(['error' => 'The activation code is already linked to this device'], 400);
            }

            $deviceWithActivationCode = Device::where('activation_code_id', $activationCodeId)->first();
            if ($deviceWithActivationCode) {
                return response()->json(['error' => 'The activation code is already linked to another device'], 400);
            }

            if ($device->device_type === 'leasing') {
                return response()->json(['error' => 'This device already has a leasing plan'], 400);
            }

            $device->update([
                'device_type' => 'leasing',
                'activation_code_id' => $activationCodeId,
                'device_api_key' => Str::random(32),
            ]);
        } else {
            if($device->device_type === 'free') {                
                return response()->json(['error' => 'The device is already registered as free account'], 400);
            }
            $device->update([
                'device_type' => 'free',
                'device_api_key' => Str::random(32),
            ]);
        }

        return new DeviceResource($device);
    }
}
