<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Usager;
use App\Http\Requests\UsagerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usagers = Usager::all();
        return view('usagers.index', compact('usagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usagers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsagerRequest $request)
    {
        try {    
            $usager = new Usager($request->all());
            $usager->password = Hash::make($request->password);
            $usager->save();
            return redirect()->route('usagers.login')->with('success', 'Usager ajouté avec succès');
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de l'ajout d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout d\'un usager');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usagers.show', ['usager' => Usager::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usager = Usager::findOrFail($id);
        return view('usagers.edit', compact('usager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsagerRequest $request, $id)
    {
        try {
            $usager = Usager::findOrFail($id);
            $oldPassword = $request->oldPassword;
            $newPassword = $request->password;
            if(empty($newPassword) && $request->email == $usager->email) {
                $usager->update($request->except('password', 'email'));
                return redirect()->route('usagers.update', $usager->id)->with('success', 'Usager modifié avec succès');
            }
            if(empty($newPassword) && $request->email != $usager->email)
            {
                $usager->update($request->except('password'));
                return redirect()->route('usagers.update', $usager->id)->with('success', 'Usager modifié avec succès');
            }
            if (($request->email == $usager->email) && Hash::check($oldPassword, $usager->password)){
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.update', $usager->id)->with('success', 'Usager modifié avec succès');
            }   
            if (Hash::check($oldPassword, $usager->password) && ($request->email != $usager->email)) {
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.update', $usager->id)->with('success', 'Usager modifié avec succès');
            }
            else {
                return redirect()->back()->withErrors(['Mot de passe incorrect']);
            }
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de la modification d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la modification d\'un usager');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usager = Usager::findOrFail($id);
            $usager->delete();
            return redirect()->route('usagers.index')->with('success', 'Usager supprimé avec succès');
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de la suppression d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression d\'un usager');
        }
    }

    public function showLoginForm() {
        return view ('usagers.login');
    }

    public function login(Request $request) {
        $reussi = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($reussi) {
            $films = Film::all();
            return redirect()->route('films.index', compact('films'))->with('success', 'Connexion réussie');
        } else {
            return redirect()->route('usagers.login')->withErrors(['Email ou mot de passe incorrect']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('usagers.login')->with('success', 'Déconnexion réussie');
    }    
}
