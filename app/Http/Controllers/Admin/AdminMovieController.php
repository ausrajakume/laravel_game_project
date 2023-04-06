<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Language;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class AdminMovieController extends Controller
{
    /**
     * Display a listing of the movie resource.
     * @return View
     */
    public function index(): View
    {
        $models = Movie::get();
        return view('admin.movies.index', compact('models'));
    }

    /**
     * Show the form for creating a new movie resource.
     * @return View
     */
    public function create(): View
    {
        $genres = Genre::get();
        $languages = Language::get();
        $countries = Country::get();
        $actors = Actor::get();

        return view('admin.movies.create',  compact('genres','languages','countries','actors'));
    }

    /**
     *  Store a newly created movie resource in database.
     * @param StoreMovieRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreMovieRequest $request): RedirectResponse
    {
        Movie::customCreate($request);
        return to_route('admin.movies.index');
    }

    /**
     * Display the specified movie resource.
     */
    public function show(Movie $movie)
    {
         //
    }

    /**
     * Show the form for editing the specified movie resource.
     * @param Movie $movie
     * @return View
     */
    public function edit(Movie $movie): View
    {
        $genres = Genre::get();
        $languages = Language::get();
        $countries = Country::get();
        $actors = Actor::get();
        $model = $movie;

        return view('admin.movies.edit', compact('model','genres','languages','countries','actors'));
    }

    /**
     * Update the specified movie resource in database.
     * @param UpdateMovieRequest $request
     * @param Movie $movie
     *
     * @return RedirectResponse
     */
    public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
    {
        $movie->customUpdate($request);
        return to_route('admin.movies.index');
    }

    /**
     * Remove the specified movie resource from database.
     * @param Movie $movie
     * @return string
     */
    public function destroy(Movie $movie): string
    {
        $movie->delete();
        return response()->json(['success'=>true]);
    }
}
