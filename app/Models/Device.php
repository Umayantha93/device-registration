<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['device_id', 'device_type', 'activation_code_id',  'device_owner_id', 'device_api_key'];
}
