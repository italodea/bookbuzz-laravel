<?php

namespace App\Http\Requests\BookClub;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|string|max:30',
            'photo_url' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:1024',
            'is_private' => 'sometimes|boolean',
        ];
    }
}
