<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bestselling extends Model
{
    protected $table = 'best_selling';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'image', 'name_product', 'product_price', 'mo_ta', 'sales'
    ];
}
