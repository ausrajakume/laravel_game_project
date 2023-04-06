<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;

class AdminActorController extends Controller
{
    /**
     * Display a listing of the actor resource.
     * @return View
     */
    public function index(): View
    {
        $models = Actor::get();
        return view('admin.actors.index', compact('models'));
    }

    /**
     * Show the form for creating a new actor resource.
     * @return View
     */
    public function create(): View
    {
        $model = Actor::get();
        return view('admin.actors.create', compact('model'));
    }

    /**
     * Store a newly created actor resource in database.
     * @param StoreActorRequest $request
     * @return RedirectResponse
     */
    public function store(StoreActorRequest $request): RedirectResponse
    {
        Actor::create($request->all());
        return to_route('admin.actors.index');
    }

    /**
     * Display the specified actor resource.
     */
    public function show(Actor $actor): Void
    {
        //
    }

    /**
     * Show the form for editing the specified actor resource.
     * @param Actor $model
     * @return View
     */
    public function edit(Actor $actor): View
    {
        $model = $actor;
        return view('admin.actors.edit', compact('model'));
    }

    /**
     * Update the specified actor resource in database.
     * @param UpdateActorRequest $request
     * @param Actor $model
     *
     * @return RedirectResponse
     */
    public function update(UpdateActorRequest $request, Actor $actor): RedirectResponse
    {
        $actor->fill($request->all())->save();
        return to_route('admin.actors.index');
    }

    /**
     * Remove the specified actor resource from database.
     * @param Actor $actor
     *
     * @return string
     */
    public function destroy(Actor $actor): string
    {
        $actor->delete();
        return response()->json(['success'=>true]);
    }
}
