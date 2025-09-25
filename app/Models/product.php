<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected  $fillable = [
        'nameProd',
        'codeProd',
        'price',
        'stock'
    ];
}

