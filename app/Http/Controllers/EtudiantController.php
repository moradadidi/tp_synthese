<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $etudiants = Etudiant::where('nom', 'like', '%' . request('search') . '%')->paginate(5);
        } else {
            $etudiants = Etudiant::paginate(5);
        }
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiants.create', [
            'classes' => Classe::all(),
            'formations' => Formation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required', 
            'adresse' => 'required',
            'dateNaissance' => 'required',
            'idclasse' => 'required',
        ]);

        Etudiant::create($request->all());
        return redirect()->route('etudiants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        
        // dd($etudiant->classe->libelle);
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'sometimes',
            'prenom' => 'sometimes', 
            'adresse' => 'sometimes',
            'dateNaissance' => 'sometimes',
            'idclasse' => 'sometimes',
        ]);
        $etudiant->update($request->all());
        return redirect()->route('etudiants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }
}
