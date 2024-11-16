<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'hinh_thuc', 'link'
    ];
}
