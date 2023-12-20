<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'amount',
        'tax',
        'netamount',
        'currentDate',
        'file_path',
        'qty',
    ];
}
