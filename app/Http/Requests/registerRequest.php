<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

            'password.confirmed' => 'The password confirmation does not match.'
        ];
    }
    public function getName(): string
    {
        return $this->input('name');
    }
    public function getEmail(): string
    {
        return $this->input('email');
    }
    public function getPassword(): string
    {
        return $this->input('password');
    }
}
