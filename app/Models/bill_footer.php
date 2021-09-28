<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'product_id',
        'quant',
        'price',
        'total',
        'creator',
        'tree',
        'created_at',
        'updated_at'
    ] ;
}
