<?php

namespace App\Http\Requests\BookClub;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
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
        $user = Auth::user();

        return [
            'name' => 'required|string|max:30',
            'photo_url' => 'required|string|max:255',
            'description' => 'required|string|max:1024',
            'is_private' => 'required|boolean',
            'owner_id' => 'sometimes|exists:users,id',
        ];
    }
}
