<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Http\Request;

class AviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $avis = [];
        $etudiants = Etudiant::with('formations')->get();
        foreach ($etudiants as $etudiant) {
            foreach ($etudiant->formations as $formation) {
            $avis[] = [
                'avid' => $formation->pivot,
                'etudiant' => $etudiant->nom, 
                'formation' => $formation->titre, 
                'points' => $formation->pivot->points,
            ];
            }
        }
        // dd($avis);
        return view('avis.index', compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('avis.create', [
            'etudiants' => Etudiant::all(),
            'formations' => Formation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $request->validate([
                'ide'    => 'required|exists:etudiants,codeE',
                'idf'    => 'required|exists:formations,idf',
                'points' => 'required|integer|min:0|max:10',
            ]);
    
            $etudiant = Etudiant::findOrFail($request->ide);
    
            $etudiant->formations()->syncWithoutDetaching([
                $request->idf => ['points' => $request->points]
            ]);
    
            return redirect()->route('avis.index');
        }


    /**
     * Display the specified resource.
     */
    public function show(Avi $avi)
    {
        return view('avis.show', compact('avi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avi $avi)
    {
        return view('avis.edit', compact('avi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avi $avi)
    {
        $request->validate([
            'ide' => 'sometimes',
            'idf' => 'sometimes',
            'points' => 'sometimes',
        ]);

        $avi->update($request->all());

        return redirect()->route('avis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avi $avi)
    {
        $avi->delete();

        return redirect()->route('avis.index');
    }
}
