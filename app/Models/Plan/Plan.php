<?php

namespace App\Models\Plan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';

    protected $fillable = [

    'name',
    'cost',
    'slug',
    'stripe_plan',
    'description'

    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

}
