<?php

namespace App\Http\Controllers;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Models\Virement;
use Illuminate\Support\Facades\DB;
class VirementController extends Controller
{
    // Affiche tous les virements
    public function index()
    {
        $virements = Virement::all();
        return view('virements.index', compact('virements'));
    }

    // Formulaire de création
    public function create()
    {
        return view('virements.create');
    }

    // Enregistrer un nouveau virement
    public function store(Request $request)
    {
        // 1. Validation des Données
        $request->validate([
            'compte_source_id' => 'required|integer|exists:comptes,id',
            'compte_destination_id' => 'required|integer|exists:comptes,id|different:compte_source_id',
            'montant' => 'required|numeric|min:0.01',
            'date_virement' => 'required|date',
            // Si vous avez un champ description dans votre formulaire, ajoutez :
            // 'description' => 'nullable|string|max:255', 
        ]);

        $montant = $request->montant;
        $sourceId = $request->compte_source_id;
        $destinationId = $request->compte_destination_id;
        
        // 2. Récupération du Compte Source
        // Utilisation de findOrFail pour s'assurer que le compte existe
        $compteSource = Compte::findOrFail($sourceId);

        // 3. Vérification du Solde Émetteur (Votre exigence)
        if ($compteSource->solde < $montant) {
            // Affichage d'un message d'erreur (Votre exigence)
            return back()->withInput()->withErrors([
                'montant' => 'Solde insuffisant. Le compte source n\'a que ' . number_format($compteSource->solde, 2) . ' DH.'
            ]);
        }
        
        // 4. Exécution de la Transaction (Mise à jour des soldes)
        try {
            DB::beginTransaction();

            // Récupérer le compte destination (à l'intérieur de la transaction)
            $compteDestination = Compte::findOrFail($destinationId);

            // Débiter le compte source
            $compteSource->solde -= $montant;
            $compteSource->save();

            // Créditer le compte destination
            $compteDestination->solde += $montant;
            $compteDestination->save();
            
            // Enregistrer l'opération de virement
            Virement::create([
                'compte_source_id' => $sourceId,
                'compte_destination_id' => $destinationId,
                'montant' => $montant,
                'date_virement' => $request->date_virement,
                // 'description' => $request->description ?? null, // Décommenter si le champ existe
            ]);

            DB::commit(); // Valider la transaction

            return redirect()->route('virements.index')->with('success', 'Virement effectué avec succès !');

        } catch (\Exception $e) {
            DB::rollBack(); // Annuler tout en cas d'erreur
            
            \Log::error("Échec du virement: " . $e->getMessage());
            
            return back()->withInput()->withErrors([
                'general' => 'Une erreur inattendue est survenue. Veuillez réessayer.'
            ]);
        }
    }

    // Affiche un virement
    public function show(Virement $virement)
    {
        return view('virements.show', compact('virement'));
    }

    // Supprimer un virement
    public function destroy(Virement $virement)
    {
        $virement->delete();
        return redirect()->route('virements.index')->with('success', 'Virement supprimé !');
    }
}
