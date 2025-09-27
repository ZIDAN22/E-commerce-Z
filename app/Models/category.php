<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function product(){
        return $this->hasMany(product::class);
    }
}
