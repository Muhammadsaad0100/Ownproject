<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $user = $this->route('user'); 
        $userId = $user->id; 
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'status' => 'nullable|in:0,1',
            'date_of_joining' => 'required|date',
        ];
    }

}