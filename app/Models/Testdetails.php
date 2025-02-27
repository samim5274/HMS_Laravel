<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'testName',
        'categoryId',
        'subcategoryId',
        'specimenId',
        'groupId',
        'testPrice',
        'rprice',
        'room',
        'testDescription',
        'status',
    ];
}
