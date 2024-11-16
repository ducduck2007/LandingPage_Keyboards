<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name_product', 'price', 'promotion', 'image', 'parameter', 'mo_ta', 'endow', 'evaluate', 'status'
    ];
}
