<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function __invoke(string $lang)
    {
        if (in_array($lang, ['en', 'es'])) {
            session(['lang' => $lang]);
        }

        return back();
    }
}
