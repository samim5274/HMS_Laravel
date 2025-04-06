<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Reference;
use App\Models\Admin;
use App\Models\Testsaledetails;

class Refercost extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'regNum',
        'patientId',
        'userId',
        'referId',
        'amount',
        'paid',
        'remarks',
        'status'
    ];

    public function reference()
    {
        return $this->belongsTo(Reference::class, 'referId', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'userId', 'id');
    }

    public function testsaledetails()
    {
        return $this->belongsTo(Testsaledetails::class, 'patientId', 'id');
    }
}
