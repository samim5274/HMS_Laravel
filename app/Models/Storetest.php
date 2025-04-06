<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Testdetails;

class Storetest extends Model
{
    use HasFactory;

    protected $fillable = [
        'regNum',
        'testId',
        'testprice',
        'referprice',
        'categoryId',
        'subcategoryId',
        'specimenId',
        'groupId',
        'room',
        'status',
        'reportstatus',
    ];

    public function testdetails()
    {
        return $this->belongsTo(Testdetails::class, 'testId', 'id');
    }
}
