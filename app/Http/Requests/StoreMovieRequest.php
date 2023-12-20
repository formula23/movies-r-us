<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
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
            'slug' => 'required|string|max:255|unique:movies',
            'studio' => 'required|string|max:255',
            'runtime' => 'required|date_format:H:i',
            'description' => 'required|string',
            'genre' => 'required|string|in:'.implode(',', config('moviesrus.movies.genres')),
            'release_date' => 'required|date',
        ];
    }
}
