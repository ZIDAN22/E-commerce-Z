<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class product extends Model
{
    protected $fillable =[
        'nameProd',
        'image',
        'category_id',
        'Desc',
        'price',
        'stock',
        'creted_at',
        'updated_at',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
