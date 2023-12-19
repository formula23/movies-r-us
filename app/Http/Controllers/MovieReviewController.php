<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Http\Resources\ReviewResource;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Movie $movie)
    {

        $movie->loadAvg('reviews', 'rating');

        return inertia()->render('MovieReviews/Index', [
            'movie' => new MovieResource($movie),
            'reviews' => ReviewResource::collection($movie->reviews()->with('user')->paginate(5)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Movie $movie)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie, Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie, Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie, Review $review)
    {
        //
    }
}
