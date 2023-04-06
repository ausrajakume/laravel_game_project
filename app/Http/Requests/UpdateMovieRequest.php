<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'release_date' => 'required|date',
            'description' => 'required',
            'description' => 'required|string',
            'runtime' => 'required|numeric|max_digits:3',
            'rating' => 'required|max:5',
            'genres' => 'required|array|min:1',
            'countries' => 'required|array|min:1',
            'actors' => 'required|array|min:1',
            'languages' => 'required|array|min:1',
            'genres.*' => 'required|exists:genres,id',
            'countries.*' => 'required|exists:countries,id',
            'actors.*' => 'required|exists:actors,id',
            'languages.*' => 'required|exists:languages,id',
        ];
    }
}
