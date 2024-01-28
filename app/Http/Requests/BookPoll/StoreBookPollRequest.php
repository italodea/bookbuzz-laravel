<?php

namespace App\Http\Requests\BookPoll;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookPollRequest extends FormRequest
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
            'book_club_id' => 'sometimes|exists:book_cli,id',
            'user_id' => 'sometimes|exists:users,id',
            'start_date_poll' => 'required|date',
            'end_date_poll' => 'required|date|after:start_date_poll',
            'final_read_date' => 'sometimes|date|after:end_date_poll',
            'book_id' => 'sometimes|string',
            'book' => 'sometimes',
        ];
    }
}
