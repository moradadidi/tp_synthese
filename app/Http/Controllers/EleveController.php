<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::with("club")->get();
        $clubs = Club::all();

        // dd($eleves);
        return view("eleves.index", compact('eleves', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs=Club::all();
        return view("eleves.create" , compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required|string",
            "prenom" => "required|string",
            "club_id" => "required"
        ]);

        try {
            $data = $request->all();
            $data['club_id'] = (int) $data['club_id'];
            Eleve::create($data);
            return redirect()->route('eleves.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        return view('eleves.show' , compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve)
    {
        $clubs=Club::all();
        return view("eleves.create" , compact('eleve','clubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve)
    {
         $request->validate([
            "nom"=>"sometimes|string",
            "prenom"=>"sometimes|string",
            "club_id"=>"sometimes|integer|exists:clubs,id"
        ]);

        $eleve->update($request->all());
        return redirect()->route('eleves.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return redirect()->route('eleves.index');
    }
}
