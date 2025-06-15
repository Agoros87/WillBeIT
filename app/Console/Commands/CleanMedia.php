<?php

namespace App\Console\Commands;

use App\Models\Comment;
use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Video;
use App\Models\Podcast;

class CleanMedia extends Command
{
    protected $signature = 'clean:media';
    protected $description = 'Elimina todos los posts, videos y podcasts de la base de datos';

    public function handle(): void
    {
        $postCount = Post::count();
        Post::query()->delete();
        $this->info("Se eliminaron $postCount posts.");

        $videoCount = Video::count();
        Video::query()->delete();
        $this->info("Se eliminaron $videoCount videos.");

        $podcastCount = Podcast::count();
        Podcast::query()->delete();
        $this->info("Se eliminaron $podcastCount podcasts.");

        $commentsCount = Comment::count();
        Comment::query()->delete();
        $this->info("Se eliminaron $commentsCount comentarios.");
    }

}
