<?php

namespace App\Modules\JobPosting\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostingRequestCreate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'posted_by' => 'required|integer|exists:users,id',
        ];
    }
}