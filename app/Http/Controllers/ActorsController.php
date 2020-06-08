<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function Index () {
        //return "Hello";
        $glumci = Actor::paginate(15);
        return view('actor.index', compact('glumci'));
    }
    
     public function create()
    {
        return view ('actor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request, Actor $actor)
    {
        $validatedData = $request->validate([
        'first_name'  => 'required|string|max:45|alpha',
        'last_name'   => 'required|string|max:45|alpha',
    ]);
     $actor->first_name = $request->input('first_name');
     $actor->last_name = $request->input('last_name');
     $actor->save(); // sacuvaj u bazu podataka

     return redirect()->route('actors.index')->with('success', 'Actor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param Adresa $adresa
     *
     * @return Response
     */
    public function show(Actor $actor)
    {
        return view('actor.show', ['actor' => $actor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Actor $actor
     *
     * @return Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.edit', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Actor $actor
     *
     * @return Response
     */
    public function update(Request $request, Actor $actor)
    {
        //TODO Validacija na nacin Laravel 7
       $validatedData = $request->validate([
        'actor_id'    => 'required|numeric',
        'first_name'  => 'required|string|max:45|alpha',
        'last_name'   => 'required|string|max:45|alpha',
    ]);
     $actor->first_name = $request->input('first_name');
     $actor->last_name = $request->input('last_name');
     $actor->save(); // sacuvaj u bazu podataka

     return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adresa $adresa
     *
     * @return Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actors.index')->with('success', 'Actor deleted!');
    }
}
