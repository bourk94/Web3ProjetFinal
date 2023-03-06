<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsagerRequest extends FormRequest
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
            'nom' =>  'required|string|max:100|min:2',
            'prenom' => 'required|string|max:100|min:2',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:usagers,email,' . $this->id,
            'password' => ($this->id ? 'nullable|' : 'required|') . 'string|min:8|max:15|confirmed'
        ];
    }

    
    public function message() 
    {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'nom.string' => 'Le nom doit être une chaîne de caractères',
            'nom.max' => 'Le nom doit avoir au plus 100 caractères',
            'nom.min' => 'Le nom doit avoir au moins 2 caractères',
            'prenom.required' => 'Le prénom est obligatoire',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères',
            'prenom.max' => 'Le prénom doit avoir au plus 100 caractères',
            'prenom.min' => 'Le prénom doit avoir au moins 2 caractères',
            'date_naissance.required' => 'La date de naissance est obligatoire',
            'date_naissance.date' => 'La date de naissance doit être une date',
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email doit être une adresse email',
            'email.unique' => 'L\'email est déjà utilisé',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères',
            'password.max' => 'Le mot de passe doit avoir au plus 15 caractères',
            'password.confirmed' => 'Les mots de passe ne sont pas identiques',
        ];
    }
}
