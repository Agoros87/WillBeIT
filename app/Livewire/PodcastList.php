<?php

namespace App\Livewire;

use App\Models\Podcast;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class PodcastList extends Component
{
    use WithPagination;

    public $selectedTags = [];
    protected $listeners = ['tagsUpdated' => 'updateTagsFilter'];

    public function updateTagsFilter($data): void
    {
        $this->selectedTags = $data;
        $this->resetPage();
    }

    public function getPodcasts(): LengthAwarePaginator
    {
        $query = Podcast::query()
            ->with(['tags' => function ($query) {
                $query->select('tags.id', 'tags.name');
            }]);

        if (!empty($this->selectedTags)) {
            $query->whereHas('tags', function ($query) {
                $query->whereIn('tags.name', $this->selectedTags);
            }, '=', count($this->selectedTags));
        }

        return $query->where('status', '=','approved')->latest()->paginate(9);
    }

    public function render()
    {
        return view('livewire.podcast-list', [
            'podcasts' => $this->getPodcasts()
        ]);
    }
}
