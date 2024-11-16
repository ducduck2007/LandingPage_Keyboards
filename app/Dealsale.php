<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealsale extends Model
{
    protected $table = 'deal_sale';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'image', 'name_product', 'content', 'price', 'vi_tri', 'parameter', 'promotion', 'mo_ta', 'endow', 'evaluate'
    ];
}
