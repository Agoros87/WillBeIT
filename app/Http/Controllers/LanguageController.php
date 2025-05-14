<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    public function __invoke(string $lang)
    {
        $langKeys = collect(File::directories(lang_path()))
            ->map(fn($dir) => basename($dir))
            ->toArray();

        if (in_array($lang, $langKeys)) {
            session(['lang' => $lang]);
        }

        return back();
    }
}
