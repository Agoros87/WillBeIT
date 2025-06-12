<?php

namespace App\View\Components;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TagFilter extends Component
{
    public Collection $tagsSelected;

    public function __construct()
    {
        $this->tagsSelected = Tag::all();
    }

    public function render(): View
    {
        return view('components.tag-filter');
    }
}
