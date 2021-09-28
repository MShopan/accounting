<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_header extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'customer_id',
        'employee_id',
        'chairs',
        'tables',
        'prepaid',
        'big_total',
        'discount',
        'pure_total',
        'creator',
        'created_at',
        'updated_at',
    ];
}
