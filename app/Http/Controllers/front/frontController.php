<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $home = Home::orderBy('id', 'desc')->first();
        return view('front.index', compact('home'));
    }
}
