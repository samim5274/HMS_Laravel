<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Excategory;

class Exsubcategory extends Model
{
    use HasFactory;

    protected $filaable = ['categoryId','subcategory'];

    public function category()
    {
        return $this->belongsTo(Excategory::class, 'categoryId', 'id');
    }

    public function exsubcategory()
    {
        return $this->hasMany(Exsubcategory::class, 'subCatId', 'id');
    }
}
