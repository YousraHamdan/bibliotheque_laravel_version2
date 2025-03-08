<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use Illuminate\Http\Request;
use App\Events\LivreHistoryEvent;
use Illuminate\Support\Facades\Auth;



class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer',
            'nombre_pages' => 'required|integer',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $livre = Livre::create($request->all());

        event(new LivreHistoryEvent($livre, 'created', $livre->getAttributes(), Auth::user()));

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer',
            'nombre_pages' => 'required|integer',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $oldAttributes = $livre->getAttributes(); // Store old attributes
        $livre->update($request->all());
    
        $changes = array_diff($livre->getAttributes(), $oldAttributes); // Get the changed fields
    
        event(new LivreHistoryEvent($livre, 'updated', $changes, Auth::user()));
    
        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        event(new LivreHistoryEvent($livre, 'deleted', $livre->getAttributes(), Auth::user()));

        $livre->delete();
    
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès!');    
    }
}
