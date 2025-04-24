<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::with('classes')->get();
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'nbreHeure' => 'required',
        ]);

        Formation::create($request->all());
        return redirect()->route('formations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        // dd($formation);
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'titre' => 'required',
            'nbreHeure' => 'required',
        ]);

        $formation->update($request->all());
        return redirect()->route('formations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index');
    }
}
