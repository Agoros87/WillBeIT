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

    public function updateTagsFilter($data): void
    {
        $this->selectedTags = $data;
        $this->resetPage();
    }

    public function getPosts(): LengthAwarePaginator
    {
        $query = Post::query()
            ->with(['video', 'user', 'podcast', 'tags' => function ($query) {
                $query->select('tags.id', 'tags.name');
            }]);

        if (!empty($this->selectedTags)) {
            $query->whereHas('tags', function ($query) {
                $query->whereIn('tags.name', $this->selectedTags);
            }, '=', count($this->selectedTags));
        }
        return $query->where('status', '=', 'approved')->latest()->paginate(9);
    }

    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->getPosts()
        ]);
    }
}
