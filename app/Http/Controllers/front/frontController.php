<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Home;
use App\Models\Skill;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $home = Home::orderBy('id', 'desc')->first();

        $about=About::orderBy('id', 'desc')->first();

        $skill=Skill::all()->take(6);
        /*or:    $skill=Skill::orderBy('id', 'desc')->take(6)->get();  */
        $blog=Blog::orderBy('id', 'desc')->take(3)->get();
        return view('front.index', compact('home','about','skill','blog'));
    }
}
