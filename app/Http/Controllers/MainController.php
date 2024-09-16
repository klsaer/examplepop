<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show (){
        return view('welcome');
    }

    public function first() {
        $a = 1;
        $b = 2;
        $c = $a + $b;
        $dev = $b - $a;    
        return view('first',compact('c','dev'));
    }
}
