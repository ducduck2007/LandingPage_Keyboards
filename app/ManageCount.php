<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageCount extends Model
{
    protected $table = 'manage_count';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_join_table', 'type_device','type_join_table','created_at','updated_at','ip','type','referrer'
    ];
}