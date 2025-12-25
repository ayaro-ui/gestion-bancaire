<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Compte;
use App\Models\Client;
use App\Models\Virement;

class AdminController extends Controller
{
    public function profile()
{
    // Vérifier si l'utilisateur est connecté
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }
    
    $admin = Auth::user();
    $comptesCount = Compte::count();
    $clientsCount = Client::count();
    $virementsCount = Virement::count();
    
    return view('admin.profile', compact('admin', 'comptesCount', 'clientsCount', 'virementsCount'));
}

    public function edit()
    {
        $admin = Auth::user();
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
        ];

        if ($request->filled('current_password') || $request->filled('password')) {
            $rules['current_password'] = 'required';
            $rules['password'] = 'required|min:8|confirmed';
            
            $validated = $request->validate($rules);
            
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.'])->withInput();
            }
            
            $admin->password = Hash::make($request->password);
        } else {
            $validated = $request->validate($rules);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profil mis à jour avec succès !');
    }
}