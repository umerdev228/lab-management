<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'name',
        'registration',
        'address',
        'admin_name',
        'contact',
        'email',
        'logo',
        'module',
        'cnic',
    ];
}
