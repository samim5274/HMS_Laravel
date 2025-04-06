<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excategory extends Model
{
    use HasFactory;

    protected $filaable = ['category'];

    public function subcategory()
    {
        return $this->hasMany(Excategory::class, 'categoryId', 'id');
    }

    public function excategory()
    {
        return $this->hasMany(Excategory::class, 'catId', 'id');
    }
}
