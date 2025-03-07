<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CourrierEntrant;
use Carbon\Carbon;

class CourrierEntrantController extends Controller
{
   
    public function dashboard() {
        // Récupérer la date et l'heure actuelles
        $now = Carbon::now();

        // Formater la date et l'heure (facultatif)
        $date = $now->format('d/m/Y'); // Exemple : 25/10/2023
        $heure = $now->format('H:i:s'); // Exemple : 14:30:45
        $totalCourriers = CourrierEntrant::count(); 
        $courrierEntrants = CourrierEntrant::orderBy('updated_at', 'desc')->paginate(6);
        return view('pages.dashboard', compact('courrierEntrants','totalCourriers','date','heure'));
    }


    public function index(Request $request)
    {
        if($request){
                $search = $request->input('search');

            $courrierEntrants = CourrierEntrant::when($search, function ($query) use ($search) {
                $query->where('expediteur', 'like', '%' . $search . '%')
                    ->orWhere('objet', 'like', '%' . $search . '%');
            })->paginate(8);
            return view('pages.listingCourrieArriv', compact('courrierEntrants'));
        }else{

            $courrierEntrants = CourrierEntrant::paginate(8);
            return view('pages.listingCourrieArriv', compact('courrierEntrants'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ajouteCourrierArrive');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_piece' => 'required|integer',
            'date_reception' => 'required|date',
            'expediteur' => 'required|string',
            'objet' => 'required|string',
            'pieces_jointes' => 'nullable|file',
            'no_archive' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $filePath = $request->file('pieces_jointes')->store('courriers', 'public');
        } else {
            $filePath = null;
        }

        CourrierEntrant::create([
            'nombre_piece' => $request->nombre_piece,
            'date_reception' => $request->date_reception,
            'expediteur' => $request->expediteur,
            'objet' => $request->objet,
            'pieces_jointes' => $filePath,
            'no_archive' => $request->no_archive,
            'description' => $request->description,
        ]);

        return redirect()->route('courrier-entrants.index')->with('success', 'Courrier ajouté avec succès');
    }

    public function edit($id)
    {
        $courrierEntrant = CourrierEntrant::findOrFail($id);
        return view('pages.editCourrierArrive', compact('courrierEntrant'));
    }

    public function update(Request $request, $id)
    {
        $courrier = CourrierEntrant::findOrFail($id);

        $request->validate([
            'nombre_piece' => 'required|integer',
            'date_reception' => 'required|date',
            'expediteur' => 'required|string',
            'objet' => 'required|string',
            'pieces_jointes' => 'nullable|file',
            'no_archive' => 'required|string',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $filePath = $request->file('pieces_jointes')->store('courriers', 'public');
            $courrier->pieces_jointes = $filePath;
        }

        $courrier->update([
            'nombre_piece' => $request->nombre_piece,
            'date_reception' => $request->date_reception,
            'expediteur' => $request->expediteur,
            'objet' => $request->objet,
            'no_archive' => $request->no_archive,
            'description' => $request->description,
        ]);

        return redirect()->route('courrier-entrants.index')->with('success', 'Courrier mis à jour avec succès');
    }

    public function destroy($id)
    {
        $courrier = CourrierEntrant::findOrFail($id);
        $courrier->delete();

        return redirect()->route('courrier-entrants.index')->with('success', 'Courrier supprimé avec succès');
    }
}