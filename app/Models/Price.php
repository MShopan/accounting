<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Partition;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'partition_id',
        'price',
        'notes',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function partition()
    {
        return $this->belongsTo(Partition::class, 'partition_id');
    }
}
