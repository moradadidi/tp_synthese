<?php
namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Formation;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::with('formation')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $formations = Formation::all();
        return view('classes.create', compact('formations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'nombreMax' => 'required|integer|min:1',
            'idformation' => 'required|exists:formations,idf',
        ]);

        Classe::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Classe ajoutée avec succès.');
    }

    public function show($id)
    {
        $classe = Classe::with('formation')->findOrFail($id);
        // dd($classe);
        return view('classes.show', compact('classe'));
    }

    public function edit(Classe $class)
    {
        $formations = Formation::all();
        return view('classes.edit', ['classe' => $class, 'formations' => $formations]);
    }
    

    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'nombreMax' => 'required|integer|min:1',
            'idformation' => 'required|exists:formations,idf',
        ]);

        $classe->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Classe mise à jour.');
    }

    public function destroy(Classe $classe)
    {
        $classe->delete();
        return redirect()->route('classes.index')->with('success', 'Classe supprimée.');
    }
}
