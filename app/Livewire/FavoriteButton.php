<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class FavoriteButton extends Component
{
    public $model; // Mantén el tipo dinámico para el modelo.
    public bool $isFavorite = false;

    // Este array mapea los modelos con sus relaciones correspondientes
    protected $modelRelations = [
        \App\Models\Post::class => 'favoritePosts',
        \App\Models\Video::class => 'favoriteVideos',
        \App\Models\Podcast::class => 'favoritePodcasts',
    ];

    // El método mount recibe el modelo directamente sin inyectarlo
    public function mount($model)
    {
        $this->model = $model;

        if (auth()->check()) {
            $this->checkIfFavorite();
        }
    }

    // Función para verificar si el modelo es favorito
    protected function checkIfFavorite()
    {
        $modelClass = get_class($this->model);

        // Verificar si el modelo tiene la relación en el array de relaciones
        if (array_key_exists($modelClass, $this->modelRelations)) {
            $relation = $this->modelRelations[$modelClass];
            // Comprobar si el modelo es favorito por el usuario
            $this->isFavorite = auth()->user()->$relation()->where('favoritable_id', $this->model->id)->exists();
        }
    }

    // Alterna el estado de favorito
    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return;
        }

        $user = auth()->user();
        $modelClass = get_class($this->model);

        // Verificar si el modelo tiene la relación para cambiar el estado de favorito
        if (array_key_exists($modelClass, $this->modelRelations)) {
            $relation = $this->modelRelations[$modelClass];

            // Marcar o desmarcar como favorito
            if ($this->isFavorite) {
                $user->$relation()->detach($this->model);
            } else {
                $user->$relation()->attach($this->model);
            }

            // Cambiar el estado de favorito
            $this->isFavorite = !$this->isFavorite;
        }
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
