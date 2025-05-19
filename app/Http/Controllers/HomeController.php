<?php

namespace App\Http\Controllers;

use App\Models\Center;

class HomeController extends Controller
{
    public function __invoke()
    {
        $centers = Center::withCount('posts')->with('users')->get();



        return view('home', compact('centers'));
    }
}
