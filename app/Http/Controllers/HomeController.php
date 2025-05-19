<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Tag;

class HomeController extends Controller
{
    public function __invoke()
    {
        $centers = Center::withCount('posts')->with('users')->get();

        $tags = Tag::all();

        return view('home', compact('centers'), compact('tags'));
    }
}
