<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageheader extends Model
{
    protected $table = 'image_header';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'image'
    ];
}
