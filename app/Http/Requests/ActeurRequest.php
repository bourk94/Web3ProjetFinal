<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActeurRequest extends FormRequest
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
            'nom' => 'required|string|max:50|min:2',
            'prenom' => 'required|string|max:50|min:2',
            'date_naissance' => 'required|date',
            'nationalite' => 'required|string|max:50|min:2',
            'photo' => ($this->id ? 'nullable|' : 'required|') . 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.string' => 'Le nom doit être une chaîne de caractères',
            'nom.max' => 'Le nom doit avoir au plus 50 caractères',
            'nom.min' => 'Le nom doit avoir au moins 2 caractères',
            'prenom.required' => 'Le prénom est obligatoire',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères',
            'prenom.max' => 'Le prénom doit avoir au plus 50 caractères',
            'prenom.min' => 'Le prénom doit avoir au moins 2 caractères',
            'date_naissance.required' => 'La date de naissance est obligatoire',
            'date_naissance.date' => 'La date de naissance doit être une date',
            'nationalite.required' => 'La nationalité est obligatoire',
            'nationalite.string' => 'La nationalité doit être une chaîne de caractères',
            'nationalite.max' => 'La nationalité doit avoir au plus 50 caractères',
            'nationalite.min' => 'La nationalité doit avoir au moins 2 caractères',
            'photo.required_without_all' => 'La photo est obligatoire',
            'photo.image' => 'La photo doit être une image',
            'photo.mimes' => 'La photo doit être au format jpeg, png, jpg, gif, svg ou webp',
            'photo.max' => 'La photo doit avoir au plus 8 Mo'
        ];
    }
}
