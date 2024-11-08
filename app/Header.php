<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'header';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'title', 'content', 'image'
    ];
}
