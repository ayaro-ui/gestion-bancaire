<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ⬅️ IMPORTANT : Utiliser la façade Auth

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLogin()
    {
        return view('auth.login');
    }

    // Vérifier l'email et le mot de passe et connecter l'utilisateur
    public function login(Request $request)
    {
        // 1. Validation de la saisie
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tenter l'authentification
        // Auth::attempt gère la vérification du hash et la connexion en session.
        if (Auth::attempt($credentials)) {
            // Régénérer l'ID de session pour prévenir les attaques de fixation de session
            $request->session()->regenerate();

            // Rediriger vers le tableau de bord ou la page souhaitée
            return redirect()->intended('/')->with('success', 'Connexion réussie !');
        }

        // 3. Échec de l'authentification
        // L'erreur est renvoyée si l'email OU le mot de passe est incorrect.
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email');
    }
    
    // Déconnecter l'utilisateur (votre exigence)
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnexion de l'utilisateur

        $request->session()->invalidate(); // Invalider la session actuelle

        $request->session()->regenerateToken(); // Régénérer le jeton CSRF

        return redirect('/login')->with('success', 'Vous êtes déconnecté.');
    }
}