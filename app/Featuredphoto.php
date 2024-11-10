<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featuredphoto extends Model
{
    protected $table = 'featured_photo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'vi_tri', 'image'
    ];
}
