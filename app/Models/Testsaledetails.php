<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testsaledetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg',
        'date',
        'name',
        'dob',
        'gender',
        'phone',
        'address',
        'doctorId',
        'referId',
        'total',
        'discount',
        'payable',
        'pay',
        'duestatus',
        'due',
        'reportstatus',
    ];
}
