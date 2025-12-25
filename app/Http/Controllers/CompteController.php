<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Client;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index()
    {
        $comptes = Compte::with('client')->get();
        return view('comptes.index', compact('comptes'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('comptes.create', compact('clients'));
    }

  public function store(Request $request)
{
    $request->validate([
        'type' => 'required',
        'solde' => 'required|numeric',
        'client_id' => 'required|exists:clients,id',
        'rib' => 'required|string|unique:comptes,rib', // 'rib' en minuscule
    ]);

    Compte::create($request->all());

    return redirect()->route('comptes.index');
}
    public function edit($id)
    {
        $compte = Compte::findOrFail($id);
        $clients = Client::all();
        return view('comptes.edit', compact('compte', 'clients'));
    }

  public function update(Request $request, $id)
{
    // Validation - utilisez 'rib' en minuscule
    $request->validate([
        'type' => 'required|string|max:255',
        'solde' => 'required|numeric',
        'client_id' => 'required|exists:clients,id',
        'rib' => 'required|string|unique:comptes,rib,' . $id, // 'rib' en minuscule
    ]);

    $compte = Compte::findOrFail($id);
    $compte->update($request->all());

    return redirect()->route('comptes.index');
}

    public function destroy($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->delete();

        return redirect()->route('comptes.index');
    }
}
