<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnes = Personne::all();
        return view('personnes.index', compact('personnes'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'active' => '',
            'favorite' => ''
        ]);

        $personne = new Personne;
        $personne->firstName = $request->firstName;
        $personne->lastName = $request->lastName;
        $personne->active = ($request->activeBox === "on");
        $personne->favorite = ($request->favoriteBox === "on");
        $personne->save();

        return back()->with('message', "La tâche a bien été créée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        return view('personnes.show', compact('personne'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        return view('personnes.edit', compact('personne')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        $data = $request->validate([
            'firstName' => 'required|max:100',
            'lastName' => 'required|max:100',
            'active' => '',
            'favorite' => ''
        ]);

        $personne->firstName = $request->firstName;
        $personne->lastName = $request->lastName;
        $personne->active = ($request->activeBox === "on");
        $personne->favorite = ($request->favoriteBox === "on");
        $personne->save();
    
        return back()->with('message', "La tâche a bien été modifiée !");        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        $personne->delete();
    }
}
