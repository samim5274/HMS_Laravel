<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'superAdmin',
        'photo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function refercost()
    {
        return $this->hasMany(Admin::class, 'userId', 'id');
    }
}
