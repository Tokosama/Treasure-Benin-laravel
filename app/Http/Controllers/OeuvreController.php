<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Categorie;
use App\Models\Oeuvre;
use Illuminate\Http\Request;

class OeuvreController extends Controller
{
    //
    public function index(){
        $oeuvres = Oeuvre::with(['artiste','categorie'])->get();
        return view('oeuvres.index', compact('oeuvres'));
    }
    public function create(){
        $categories = Categorie::all();
        $artistes = Artiste::all();
        return view('oeuvres.create',compact('categories','artistes'));
    }
    public function store(Request $request)
    {
        $oeuvre = $request->validate([
            'nom' => 'required',
            'idCategorie' => 'required|exists:categories,idCategorie',
            'idArtiste' => 'nullable|exists:artistes,idArtiste',
            'annnee' => 'nullable|integer',
            'description' => 'nullable'
        ]);
    
        // Debug facultatif
    
      $final =  Oeuvre::create($oeuvre);
        return redirect()->route('oeuvre.index')->with('success', 'Oeuvre ajoutée avec succès');
    }

    public function edit(Oeuvre $oeuvre){
        $categories = Categorie::all();
        $artistes = Artiste::all();
        return view('oeuvres.edit',compact('oeuvre','categories','artistes') );
    }
    public function update(Oeuvre $oeuvre,Request $request){
        $updateOeuvre = $request->validate([
            'nom' => 'required',
            'idCategorie' => 'required|exists:categories,idCategorie',
            'idArtiste' => 'nullable|exists:artistes,idArtiste',
            'annnee' => 'nullable|integer',
            'description' => 'nullable'
        ]);
        
        $oeuvre->update($updateOeuvre);
        return redirect(route('oeuvre.index'))->with('success', 'Oeuvre Modifié avec succès');
    }
    

    public function destroy(Oeuvre $oeuvre){

        $oeuvre->delete();
        return redirect(route('oeuvre.index'))->with('success', 'Oeuvre Supprimé avec succès');

    }
}
