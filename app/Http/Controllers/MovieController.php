<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Notifications\MovieSubmitted;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {

        $movies = Movie::select([
            'movies.*',
            DB::raw('YEAR(movies.release_date) as release_year'),
            'users.name as user_name'
        ])
            ->with(['user'])
            ->join('users', 'users.id', '=', 'movies.user_id')
            ->search(request('search', ''))
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->sort(request('sort', 'title'), request('direction', 'asc'))
            ->paginate($this->getPerPage())
            ->withQueryString();

        return inertia()->render('Movies/Index', [
            'movies' => MovieResource::collection($movies),
            'perPage' => $this->getPerPage(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia()->render('Movies/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        try {
            $movie = auth()->user()->movies()->create($request->safe()->only(['title', 'description', 'genre', 'release_date']));

            auth()->user()->notify(new MovieSubmitted($movie));

            session()->flash('success', $movie->title.' Movie created successfully');

        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return inertia()->render('Movies/Show', [
            'movie' => new MovieResource($movie),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return inertia()->render('Movies/Edit', [
            'movie' => new MovieResource($movie),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        try {
            $movie->update($request->safe()->only(['title', 'description', 'genre', 'release_date']));
            session()->flash('success', $movie->title.' Movie updated successfully');

        } catch(\Exception $e) {

            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        try {
            $movie->delete();
            session()->flash('success', $movie->title.' Movie deleted successfully');

        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('movies.index');
    }

    protected function getPerPage(): int
    {
        if(request('perPage')) {
            Cache::set('movies_per_page_'.auth()->user()->id, $perPage = request('perPage'));
        } elseif(Cache::has('movies_per_page_'.auth()->user()->id)) {
            $perPage = Cache::get('movies_per_page_'.auth()->user()->id);
        } else {
            $perPage = Cache::set('movies_per_page_'.auth()->user()->id, request('perPage', 10));
        }
        return $perPage;
    }

}
