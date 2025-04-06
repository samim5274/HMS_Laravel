<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'refName',
        'refAddress',
        'refPhone',
    ];

    public function refercost()
    {
        return $this->hasMany(Reference::class, 'referId', 'id');
    }
}
