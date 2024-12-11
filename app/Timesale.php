<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesale extends Model
{
    protected $table = 'timeSale';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'time'
    ];
}
