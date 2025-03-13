<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storetest extends Model
{
    use HasFactory;

    protected $fillable = [
        'regNum',
        'testId',
        'testprice',
        'categoryId',
        'subcategoryId',
        'specimenId',
        'groupId',
        'room',
        'status',
    ];
}
