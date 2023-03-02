<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title' => ['required','unique:movies','max:90'],
            'original_title' => ['nullable','max:100'],
            'nationality' => ['nullable','max:20'],
            'release_date' => ['required','date'],
            'vote' => ['required|numeric'],
            'cast' => ['nullable','max:500'],
            'cover_path' => ['nullable','max:200']
        ]; 
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Questo titolo è già stato assegnato ad un progetto',
            'title.max' => 'Il titolo non deve essere più lungo di :max caratteri',
            'nationality.max' => 'La nazionalità deve avere non più di :max caratteri',
            'release_date.required' => 'La data è obbligatoria',
            'release_date.date' => 'La data inserita non è valida',
            'vote.required' => 'Il voto è obbligatorio',
            'vote.numeric' => 'Il voto inserito non è valido',
            'cast.max' => 'Il cast non deve avere più di :max caratteri',
            'cover_path.max' => 'Il cast non deve avere più di :max caratteri',
        ];
    }
}
