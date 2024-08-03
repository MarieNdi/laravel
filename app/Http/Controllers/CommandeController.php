<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produits;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        // Récupère tous les articles avec leurs commandes associées
        $commande = Commande::with('produits')->get();
        return view('commande.index', compact('commande'));
    }
    public function create()
    {
        $produits= Produits::all();
        return view('commande.create', compact('produits'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|string|max:255',
            'produits_id' => 'required|exists:produits,id',
        ]);

        // Création de l'article
        Commande::create($validated);

        return redirect()->route('commande.index')->with('success', 'commande created successfully');
    }
    public function edit($id)
    {
        $commande = commande::findOrFail($id);
        $produits = Produits::all(); 
        return view('commande.edit', compact('commande', 'produits'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|string|max:255',
            'produits_id' => 'required|exists:produits,id',// Assurez-vous que le nom de la table est correct ici
        ]);

        $commande = Commande::findOrFail($id);
        $commande->update([
            'reference' => $request->input('reference'),
            'produits_id' => $request->input('produits_id'),
        ]);

        return redirect()->route('commande.index')->with('success', 'commande updated successfully');
    }
    public function destroy($id)
    {
        // Trouver l'article par son ID
        $commande = Commande::findOrFail($id);

        // Supprimer l'article
        $commande->delete();

        // Rediriger vers la liste des articles avec un message de succès
        return redirect()->route('commande.index')->with('success', 'commande deleted successfully');
    }
}
