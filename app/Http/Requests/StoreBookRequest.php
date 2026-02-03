<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|min:3',
            'description' => 'required|min:10'
        ];
    }

    public function messages(): array
    {
        return[
            'title.required' => 'Le titre est obligatoire',
            'author.required' => 'Le nom de l\'auteur est obligatoire',
            'description.required' => 'La description est obligatoire',

            'title.string' => 'Le titre doit être une chaine de caractère',
            'author.string' => 'Le nom de l\'auteur doit être une chaine de caractère',
            'description.string' => 'La description doit être une chaine de caractère',

            'title.max' => "Le titre est trop long.",
            'author.min' => "Le nom de l'auteur est trop court.",
            'description.max' => "La description est trop courte."
        ];
    }
}
