<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;

class ProduisController extends Controller
{
    public function index()
    {
        $produits =Produits::all();
        return view('produits.index',['produits' => $produits]);
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $produits = new Produits();
        $produits->nom_produits = $request->nom_produits;
        $produits->price = $request->price;
        
        $produits->save();
        return redirect()->route('produits.index');
    }
    public function edit($id)
    {
        $produits = Produits::findOrFail($id);
        return view('produits.edit', compact('produits'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_produits' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $produits = Produits::findOrFail($id);
        $produits->update($validatedData);

        return redirect()->route('produits.index');
    }




    public function destroy($id)
    {
        $produits = Produits::findOrFail($id);
        $produits->delete();

        return redirect()->route('produits.index');
    }
    //
}
