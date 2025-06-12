<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $selectedTags = [];
    protected $listeners = ['tagsUpdated' => 'updateTagsFilter'];

    public function updateTagsFilter($data)
    {
        $this->selectedTags = $data;
        $this->resetPage();
    }

    public function getPosts(): LengthAwarePaginator
    {
        $query = Post::with(['video', 'podcast', 'user', 'tags']);

        if (count($this->selectedTags) > 0) {
            foreach ($this->selectedTags as $tag) {
                $query->whereHas('tags', function ($q) use ($tag) {
                    $q->where('tags.name', $tag);
                });
            }
        }
        return $query->paginate(9);
    }

    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->getPosts()
        ]);
    }
}