<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourrierSortant;

class CourrierSortantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request){
                $search = $request->input('search');

            $courrierSortants = CourrierSortant::when($search, function ($query) use ($search) {
                $query->where('destinataire', 'like', '%' . $search . '%')
                    ->orWhere('objet', 'like', '%' . $search . '%');
            })->paginate(8);
            return view('pages.CourrierSortie.listingCourrieSortant', compact('courrierSortants'));
        }else{

            $courrierSortants = CourrierSortant::paginate(8);
            return view('pages/CourrierSortie.listingCourrieSortant', compact('courrierSortants'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/CourrierSortie.ajouteCourrierSortant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_piece' => 'required|integer',
            'date_envoi' => 'required|date',
            'destinataire' => 'required|string',
            'objet' => 'required|string',
            'pieces_jointes' => 'nullable|file',
            'no_archive' => 'required|string|nullable',
            'description' => 'nullable|string|nullable',
        ],[
            'pieces_jointes.file' => 'Le fichier doit être un fichier valide',
            'nombre_piece.integer' => 'Le nombre de pièces doit être un nombre entier',
            'date_envoi.date' => 'La date de réception doit être une date valide',
            'destinataire.string' => 'L\'expéditeur doit être une chaîne de caractères',
            'objet.string' => 'Le champs objet est requis',
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $filePath = $request->file('pieces_jointes')->store('courriers', 'public');
        } else {
            $filePath = null;
        }

        CourrierSortant::create([
            'nombre_piece' => $request->nombre_piece,
            'date_envoi' => $request->date_envoi,
            'destinataire' => $request->destinataire,
            'objet' => $request->objet,
            'pieces_jointes' => $filePath,
            'no_archive' => $request->no_archive,
            'description' => $request->description,
        ]);

        return redirect()->route('courrier-sortants.index')->with('success', 'Courrier ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $courrierEntrant = CourrierSortant::findOrFail($id);
        return view('pages/CourrierSortie.editCourrierSortie', compact('courrierEntrant'));
    }

    public function update(Request $request, $id)
    {
        $courrier = CourrierSortant::findOrFail($id);

        $request->validate([
            'nombre_piece' => 'required|integer',
            'date_envoi' => 'required|date',
            'destinataire' => 'required|string',
            'objet' => 'required|string',
            'pieces_jointes' => 'nullable|file',
            'no_archive' => 'required|string|nullable',
            'description' => 'nullable|string|nullable',
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $filePath = $request->file('pieces_jointes')->store('courriers', 'public');
            $courrier->pieces_jointes = $filePath;
        }

        $courrier->update([
            'nombre_piece' => $request->nombre_piece,
            'date_envoi' => $request->date_envoi,
            'destinataire' => $request->destinataire,
            'objet' => $request->objet,
            'no_archive' => $request->no_archive,
            'description' => $request->description,
        ]);

        return redirect()->route('courrier-sortants.index')->with('success', 'Courrier mis à jour avec succès');
    }

    public function destroy($id)
    {
        $courrier = CourrierSortant::findOrFail($id);
        $courrier->delete();

        return redirect()->route('courrier-sortants.index')->with('success', 'Courrier supprimé avec succès');
    }
}
