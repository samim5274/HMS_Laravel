<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $filable = [
        'userId',
        'catId',
        'subCatId',
        'amount',
        'date',
        'remark',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Excategory::class, 'catId', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Exsubcategory::class, 'subCatId', 'id');
    }
}
