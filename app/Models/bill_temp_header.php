<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_temp_header extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'customer_id',
        'employee_id',
        'chairs',
        'tables',
        'prepaid',
        'discount',
        'creator',
    ];
}
