<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Podcast;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lastWeek = now()->subWeek();

        // Estadísticas del estudiante
        $myPost = Post::where('user_id', $user->id)->count();
        $myPodcast = Podcast::where('user_id', $user->id)->count();
        $myVideos = Video::where('user_id', $user->id)->count();
        $myComments = Comment::where('user_id', $user->id)->count();
        $myFavorites = Favorite::where('user_id', $user->id)->count();

        // Posts, podcasts y videos creados en la última semana
        $postsLastWeek = Post::where('user_id', $user->id)
            ->where('created_at', '>=', $lastWeek)
            ->count();
        $podcastsLastWeek= Podcast::where('user_id', $user->id)
            ->where('created_at', '>=', $lastWeek)
            ->count();
        $videosLastWeek= Video::where('user_id', $user->id)
            ->where('created_at', '>=', $lastWeek)
            ->count();

        // Datos para gráficos
        $totals = [
            'posts' => $myPost,
            'podcasts' => $myPodcast,
            'videos' => $myVideos,
            'comments' => $myComments,
            'favorites' => $myFavorites,
        ];

        // Datos para mostrar en la vista la actividad reciente (última semana)
        $lastActivity = [
            'posts' => $postsLastWeek,
            'podcasts' => $podcastsLastWeek,
            'videos' => $videosLastWeek,
        ];

        return view('student.dashboard', compact(
            'myPost',
            'myPodcast',
            'myVideos',
            'myComments',
            'myFavorites',
            'totals',
            'lastActivity'
        ));
    }

    public function favorites()
    {
        $user = Auth::user();

        // Obtener favoritos del usuario con las relaciones
        $favorites = Favorite::where('user_id', $user->id)
            ->with(['favoritable'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.favorites', compact('favorites'));
    }

    public function comments()
    {
        $user = Auth::user();

        // Obtener comentarios del usuario con las relaciones polimórficas
        $comments = Comment::where('user_id', $user->id)
            ->with(['commentable'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.comments', compact('comments'));
    }


    public function myPosts()
    {
        $user = Auth::user();

        // Obtener solo los posts del usuario
        $posts = Post::where('user_id', $user->id)
            ->with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.my-posts', compact('posts'));
    }

    public function myPodcasts()
    {
        $user = Auth::user();

        // Obtener solo los podcasts del usuario
        $podcasts = Podcast::where('user_id', $user->id)
            ->with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.my-podcasts', compact('podcasts'));
    }

    public function myVideos()
    {
        $user = Auth::user();

        // Obtener solo los videos del usuario
        $videos = Video::where('user_id', $user->id)
            ->with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.my-videos', compact('videos'));
    }
}
