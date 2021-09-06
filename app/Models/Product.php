<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'coad',
        'name',
        'cat_id',
        'stock',
        'min_stock',
        'popular',
        'notes',

    ];


    public function prices()
    {
        return $this->hasMany(Price::class);


    }


}
