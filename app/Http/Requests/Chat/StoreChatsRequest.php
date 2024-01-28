<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:30',
            'page' => 'sometimes|numeric|min:1',
            'charpter' => 'sometimes|numeric|min:1',
            'google_book_id' => 'sometimes|string|max:255',
            'book_club_id' => 'required|numeric|min:1',
            'user_id' => 'required|numeric|min:1',
        ];
    }
}
