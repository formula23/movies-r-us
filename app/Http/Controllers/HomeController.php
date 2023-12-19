<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $movies = Movie::with([
            'user',
            'reviews.user'
        ])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return inertia()->render('Home', [
            'movies' => MovieResource::collection($movies),
        ]);
    }
}
