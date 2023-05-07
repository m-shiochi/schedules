<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // 追記
    
    public function index()
    {
        return view('Top');
    }
    
}
