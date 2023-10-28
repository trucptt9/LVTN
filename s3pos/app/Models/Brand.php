<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory; 
    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'password',
        'address',
        'type',
        'logo',
        'status',
        'admin',
        'description',
    ];
}