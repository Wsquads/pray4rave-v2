<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealesesController extends Controller
{
    public function index(){
        return view('elements.releases');
    }
}
