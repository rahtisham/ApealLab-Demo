<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiIntegrations extends Model
{
    use HasFactory;
    
    protected $table = 'integrations';

    protected $fillable = [

        'id',
        'user_id',
        'name',
        'platform',
        'client_id',
        'client_secret',
        'is_active',
        'token',
        'status'

    ];
}
