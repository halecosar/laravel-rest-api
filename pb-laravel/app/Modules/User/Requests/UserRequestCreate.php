<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestCreate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'nullable|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'isim alanı zorunludur.',
            'email.required'    => 'E-posta alanı zorunludur.',
            'email.email'       => 'Geçerli bir e-posta adresi giriniz.',
            'email.unique'      => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min'      => 'Şifre en az 6 karakter olmalıdır.',
        ];
    }
}