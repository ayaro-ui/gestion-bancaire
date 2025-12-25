<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Virement;

class ClientProfileController extends Controller
{
    public function index()
    {
        // Récupérer le client connecté (ajustez selon votre système d'auth)
        // Si vous utilisez la table clients avec Auth::user()
        $client = Auth::user();
        
        // OU si vous stockez l'ID du client dans la session
        // $client = Client::findOrFail(session('client_id'));
        
        // OU pour tester, récupérez le premier client
        // $client = Client::first();
        
        // Récupérer tous les comptes du client
        $comptes = $client->comptes ?? collect();
        
        // Récupérer tous les virements (envoyés et reçus)
        $comptesIds = $comptes->pluck('id')->toArray();
        
        $virements = Virement::where(function($query) use ($comptesIds) {
            $query->whereIn('compte_source_id', $comptesIds)
                  ->orWhereIn('compte_destination_id', $comptesIds);
        })
        ->with(['compteSource', 'compteDestination'])
        ->orderBy('date_virement', 'desc')
        ->get();
        
        return view('client.profile', compact('client', 'comptes', 'virements'));
    }
    
    public function update(Request $request)
    {
        $client = Auth::user();
        // OU $client = Client::findOrFail(session('client_id'));
        
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);
        
        $client->update($validated);
        
        return redirect()->route('client.profile')->with('success', 'Profil mis à jour avec succès');
    }
}