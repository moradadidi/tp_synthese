<?php

namespace App\Http\Controllers;

use App\Models\CommandeProduit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandeProduits = CommandeProduit::all();
        return view('commande-produits.index', compact('commandeProduits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeProduit $commandeProduit)
    {
        //
    }
}
