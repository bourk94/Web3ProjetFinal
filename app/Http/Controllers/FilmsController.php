<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\FilmRequest;
use Illuminate\Support\Facades\File;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return View('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(FilmRequest $request) {
        try {
            $film = new Film($request->all());
            $uploadedFile = $request->file('image');
            $nomFichierUnique = str_replace(' ', '_', $film->titre) . '-' . uniqid() . '.' . $uploadedFile->extension();

            try {
                $request->image->move(public_path('img/films'), $nomFichierUnique);
            }
            catch(\Symfony\component\HttpFoundation\File\Exception\FileException $e) {
                Log::error("Erreur lors de l'upload de l'image: ", [$e]);
                return redirect()->back()->with('error', 'Erreur lors de l\'upload de l\'image');
            }

            $film->image = $nomFichierUnique;
            $film->save();
            return redirect()->route('films.create')->with('success', "Le film a été ajouté avec succès !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('films.create')->withErrors(['L\'ajout a échoué']);
        }
        return redirect()->route('films.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, $id)
    {    
        try {
            $film = Film::findOrFail($id);
              
            if ($request->hasFile('image')) {

                if(File::exists(public_path('img/films/' . $film->image))) {
                    File::delete(public_path('img/films/' . $film->image));
                }

                $uploadedFile = $request->file('image');
                $nomFichierUnique = str_replace(' ', '_', $film->titre) . '-' . uniqid() . '.' . $uploadedFile->extension();
                $nomFichierUnique = str_replace(':', '', $nomFichierUnique);

                try {
                    $request->image->move(public_path('img/films'), $nomFichierUnique);
                }
                catch(\Symfony\component\HttpFoundation\File\Exception\FileException $e) {
                    Log::error("Erreur lors de l'upload de l'image: ", [$e]);
                    return redirect()->back()->withErrors('error', 'Erreur lors de l\'upload de l\'image');
                }
                $film->image = $nomFichierUnique;
            }

            $film->titre = $request->titre;
            $film->realisateur = $request->realisateur;
            $film->genre = $request->genre;
            $film->duree = $request->duree;
            $film->annee_sortie = $request->annee_sortie;
            $film->synopsis = $request->synopsis;
            $film->save();        
            return redirect()->route('films.show', [$film])->with('success', "La modifiaton du film $film->titre a réussi !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('films.show', [$film])->withErrors(['La modification a échoué']);
        }
        return redirect()->route('films.show', [$film]);
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
            $film = Film::findOrFail($id);
            if(File::exists(public_path('img/films/' . $film->image))) {
                File::delete(public_path('img/films/' . $film->image));
            }
            $film->acteurs()->detach();
            $film->delete();
            return redirect()->route('films.index')->with('sucess', "La suppression du film $film->titre a réussi !");
        }
        catch (\Throwable $e) {
            // Le fichier de log est dans storage/logs/laravel.log
            Log::debug($e);
            return redirect()->route('films.index')->withErrors(['La suppression a échoué']);
        }
        return redirect()->route('films.index');
    }
}
