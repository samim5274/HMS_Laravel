<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Storetest;

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
        'teststatus',
    ];

    // public function storetest()
    // {
    //     return $this->hasMany(Testdetails::class, 'reg', 'id');
    // }
    // public function testcategory()
    // {
    //     return $this->belongsTo(Testcategory::class, 'categoryId', 'id');
    // }
    // public function testsubcategory()
    // {
    //     return $this->belongsTo(Testsubcategory::class, 'subcategoryId', 'id');
    // }
    // public function testspecimen()
    // {
    //     return $this->belongsTo(Testspecimen::class, 'specimenId', 'id');
    // }
    // public function testgroup()
    // {
    //     return $this->belongsTo(Testgroup::class, 'groupId', 'id');
    // }
    // public function doctor()
    // {
    //     return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    // }
    // public function refer()
    // {
    //     return $this->belongsTo(Refer::class, 'referId', 'id');
    // }
}
