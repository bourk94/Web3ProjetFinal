<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acteur;
use App\Models\Film;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ActeurRequest;
use Illuminate\Support\Facades\File;

class ActeursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acteurs = Acteur::all();
        return view('acteurs.index', compact('acteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acteurs.create');
    }

    public function createActeurFilm()
    {
        $acteurs = Acteur::all();
        $films = Film::all();
        return view('acteurs.createActeurFilm', compact('acteurs', 'films'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActeurRequest $request)
    {
        try {
            $acteur = new Acteur($request->all());
            $uploadedFile = $request->file('photo');
            $nomFichierUnique = str_replace(' ', '_', $acteur->prenom . $acteur->nom) . '-' . uniqid() . '.' . $uploadedFile->extension();

            try {
                $request->photo->move(public_path('img/acteurs'), $nomFichierUnique);
            }
            catch(\Symfony\component\HttpFoundation\File\Exception\FileException $e) {
                Log::error("Erreur lors de l'upload de la photo: ", [$e]);
                return redirect()->back()->with('error', 'Erreur lors de l\'upload de la photo');
            }
            $acteur->photo = $nomFichierUnique;
            $acteur->save();
            return redirect()->route('acteurs.create')->with('success', "L'acteur a été ajouté avec succès !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('acteurs.create')->withErrors(['L\'ajout a échoué']);
        }
        return redirect()->route('acteurs.create');
    }

    public function storeActeurFilm(Request $request)
    {
        try {
            $acteur = Acteur::findOrFail($request->acteur_id);
            $film = Film::findOrFail($request->film_id);

            // Vérification si la relation existe déjà
            if($acteur->films->contains($film)){
                return redirect()->route('acteurs.createActeurFilm')->withErrors(['La relation existe déjà']);
            }
            else{
                $acteur->films()->attach($film);
                $acteur->save();  
            }    
            return redirect()->route('acteurs.createActeurFilm')->with('success', 'La relation a été ajoutée');     
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('acteurs.createActeurFilm')->withErrors(['Une erreur est survenue']);
        }
        return redirect()->route('acteurs.createActeurFilm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('acteurs.show', ['acteur' => Acteur::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('acteurs.edit', ['acteur' => Acteur::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActeurRequest $request, $id)
    {
        try {
            $acteur = Acteur::findOrFail($id);

            if ($request->hasFile('photo')) {

                if(File::exists(public_path('img/acteurs/' . $acteur->photo))) {
                File::delete(public_path('img/acteurs/' . $acteur->photo));
                }

                $uploadedFile = $request->file('photo');
                $nomFichierUnique = str_replace(' ', '_', $acteur->prenom . $acteur->nom) . '-' . uniqid() . '.' . $uploadedFile->extension();
                $nomFichierUnique = str_replace(':', '', $nomFichierUnique);

                try {
                    $request->photo->move(public_path('img/acteurs'), $nomFichierUnique);
                }
                catch(\Symfony\component\HttpFoundation\File\Exception\FileException $e) {
                    Log::error("Erreur lors de l'upload de la photo: ", [$e]);
                    return redirect()->back()->withErrors('error', 'Erreur lors de l\'upload de la photo');
                }
                $acteur->photo = $nomFichierUnique;
            }

            $acteur->nom = $request->nom;
            $acteur->prenom = $request->prenom;
            $acteur->date_naissance = $request->date_naissance;
            $acteur->nationalite = $request->nationalite;
            $acteur->save();      
            return redirect()->route('acteurs.show', [$acteur])->with('success', "La modifiaton de l'acteur $acteur->prenom $acteur->nom a réussi !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('acteurs.show', [$acteur])->withErrors(['La modification a échoué']);
        }
        return redirect()->route('acteurs.show', [$acteur]);
        
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
            $acteur = Acteur::findOrFail($id);

            if(File::exists(public_path('img/acteurs/' . $acteur->photo))) {
                File::delete(public_path('img/acteurs/' . $acteur->photo));
            }

            $acteur->films()->detach();
            $acteur->delete();
            return redirect()->route('films.index')->with('success', "L'Acteur a été supprimé avec succès !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('films.index')->withErrors(['Une erreur est survenue']);
        }
        return redirect()->route('films.index');
    }

    public function destroyActeurFilm($id, $idFilm)
    {
        try {
            $acteur = Acteur::findOrFail($id);
            $film = Film::findOrFail($idFilm);

            $acteur->films()->detach($film);
            $acteur->save();
            return redirect()->route('acteurs.show', [$acteur])->with('success', "La relation a été supprimée avec succès !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('acteurs.show', [$acteur])->withErrors(['Une erreur est survenue']);
        }
        return redirect()->route('acteurs.show', [$acteur]);
    }
}
