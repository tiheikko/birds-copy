<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleStatistics extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bird_id' => 'required|exists:species,id',
            'user_id' => 'required|exists:users,id',
            'date_seen' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
    }
}
