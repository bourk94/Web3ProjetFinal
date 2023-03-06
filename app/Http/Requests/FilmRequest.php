<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titre' => 'required|string|max:100|min:2',
            'realisateur' => 'required|string|max:100|min:2',
            'genre' => 'required|string|max:50|min:2',
            'duree' => 'required|integer|min:1|max:1000',
            'annee_sortie' => 'required|integer|min:1900|max:2100',
            'synopsis' => 'required|string|max:2048|min:2',
            'image' => ($this->id ? 'nullable|' : 'required|') . 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
            'trailer' => 'required|url|max:1024|min:2'
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le titre est obligatoire',
            'titre.string' => 'Le titre doit être une chaîne de caractères',
            'titre.max' => 'Le titre doit avoir au plus 100 caractères',
            'titre.min' => 'Le titre doit avoir au moins 2 caractères',
            'realisateur.required' => 'Le réalisateur est obligatoire',
            'realisateur.string' => 'Le réalisateur doit être une chaîne de caractères',
            'realisateur.max' => 'Le réalisateur doit avoir au plus 100 caractères',
            'realisateur.min' => 'Le réalisateur doit avoir au moins 2 caractères',
            'genre.required' => 'Le genre est obligatoire',
            'genre.string' => 'Le genre doit être une chaîne de caractères',
            'genre.max' => 'Le genre doit avoir au plus 50 caractères',
            'genre.min' => 'Le genre doit avoir au moins 2 caractères',
            'duree.required' => 'La durée est obligatoire',
            'duree.integer' => 'La durée doit être un entier',
            'duree.min' => 'La durée doit être supérieure à 1',
            'duree.max' => 'La durée doit être inférieure à 1000',
            'annee_sortie.required' => 'L\'année de sortie est obligatoire',
            'annee_sortie.integer' => 'L\'année de sortie doit être un entier',
            'annee_sortie.min' => 'L\'année de sortie doit être supérieure à 1900',
            'annee_sortie.max' => 'L\'année de sortie doit être inférieure à 2100',
            'annee_sortie.step' => 'L\'année de sortie doit être un multiple de 1',
            'image.required_without_all' => 'L\'image est obligatoire',
            'image.image' => 'L\'image doit être une image',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif, svg ou webp',
            'image.max' => 'L\'image doit avoir une taille inférieure à 8 Mo',
            'trailer.required' => 'La bande annonce est obligatoire',
            'trailer.url' => 'La bande annonce doit être une URL',
            'trailer.max' => 'La bande annonce doit avoir au plus 1024 caractères',
            'trailer.min' => 'La bande annonce doit avoir au moins 2 caractères',
            'synopsis.required' => 'Le synopsis est obligatoire',
            'synopsis.string' => 'Le synopsis doit être une chaîne de caractères',
            'synopsis.max' => 'Le synopsis doit avoir au plus 2048 caractères',
            'synopsis.min' => 'Le synopsis doit avoir au moins 2 caractères'
        ];
    }
}
