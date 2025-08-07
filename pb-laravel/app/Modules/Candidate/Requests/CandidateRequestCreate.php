<?php

namespace App\Modules\Candidate\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequestCreate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id'     => 'required|integer',
            'first_name'     => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone' => 'required|string|min:11',
            'resume_url'     => 'nullable|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required'     => 'User Zorunludur.',
            'first_name.required'     => 'Ad Zorunludur.',
            'last_name.required'    => 'Soyad Zorunludur.',
            'email.email'       => 'Email Zorunludur.',
            'phone.unique'      => 'Phone Zorunludur.',
            'resume_url.required' => 'Cv Url Zorunludur.',
        ];
    }
}
