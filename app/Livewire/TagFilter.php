<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagFilter extends Component
{
    public $tags = [];
    public $selectedTags = [];
    public $search = '';
    protected $listeners = [
        'tag-added' => 'pushSelectedTags',
    ];

    public function mount(): void
    {
        $this->tags = Tag::all();
    }

    public function pushSelectedTags($tag): void
    {
        $this->selectedTags[] = $tag;
        $this->dispatch('tags-updated', selectedTags: $this->selectedTags)->self();
    }

    public function render()
    {
        return view('livewire.tag-filter');
    }
}
