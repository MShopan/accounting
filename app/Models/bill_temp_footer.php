<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_temp_footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'product_id',
        'quant',
        'created_at',
        'updated_at'
    ] ;
}
