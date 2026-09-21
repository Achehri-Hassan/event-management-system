<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Category;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::with('category')->get();

        return view('evenements.index', compact('evenements')); 
    }

    public function create()
    {
        $categories = Category::all();

        return view('evenements.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:150',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
            'date_evenement' => 'required|date',
            'lieu' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'status' => 'required|in:publish,draft',
            'id_category' => 'required|exists:categories,id_category',
            'heure_evenement' => 'required',
            'nombre_places' => 'required|integer|min:1',
            'date_fin' => 'nullable|date',
        ]);

        Evenement::create([
            'titre' => $request->titre,
            'content' => $request->content,
            'image' => $request->image,
            'date_evenement' => $request->date_evenement,
            'date_publication' => now(),
            'lieu' => $request->lieu,
            'prix' => $request->prix,
            'status' => $request->status,

          
            'id_organisateur' => 1,

            'id_category' => $request->id_category,
            'heure_evenement' => $request->heure_evenement,
            'nombre_places' => $request->nombre_places,
            'date_fin' => $request->date_fin,
        ]);

        return redirect()
            ->route('evenements.index')
            ->with('success', 'Événement ajouté avec succès.');
    }
}