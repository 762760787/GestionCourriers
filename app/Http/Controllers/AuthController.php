<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.sign-in');
    }

    /**
     * Authentifie l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.',
        ])->onlyInput('email');
    }

    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.sign-up');
    }

    /**
     * Enregistre un nouvel utilisateur à partir du formulaire.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5', // Pas besoin de 'confirmed' ici car le formulaire n'a pas de confirmation
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'Un compte existe déjà avec cette adresse e-mail.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        // Auth::login($user);
        // $request->session()->regenerate();

        return back()->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant utiliser ce compte pour vous connecter.');  
    }

    /**
     * Déconnecte l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Méthode inutilisée.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Méthode inutilisée.
     */
    public function destroy($id)
    {
        //
    }
}