<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class VideoList extends Component
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
        $query = Video::query()
            ->with(['tags' => function ($query) {
                $query->select('tags.id', 'tags.name');
            }]);

        if (!empty($this->selectedTags)) {
            $query->whereHas('tags', function ($query) {
                $query->whereIn('tags.name', $this->selectedTags);
            }, '=', count($this->selectedTags));
        }
        return $query->latest()->paginate(6);
    }

    public function render()
    {
        return view('livewire.video-list', [
            'videos' => $this->getPosts()
        ]);
    }
}
