<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class homeController extends Controller
{
    public function index(){
        $prod = product::paginate(2);
        return view('home', compact('prod'));
    }


}
