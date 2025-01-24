<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeasingPlan extends Model
{
    protected $fillable = ['name', 'maximum_training', 'maximum_date'];
}
