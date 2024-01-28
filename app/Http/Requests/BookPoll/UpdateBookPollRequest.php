<?php

namespace App\Http\Requests\BookPoll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBookPollRequest extends FormRequest
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
            'end_date_poll' => 'sometimes|date|after:start_date_poll',
            'final_read_date' => 'sometimes|date|after:end_date_poll',
            'book_id' => 'sometimes|string',
            'book' => 'sometimes',
        ];
    }
}
