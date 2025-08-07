<?php

namespace App\Modules\Applications\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequestCreate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'candidate_id' => 'required|exists:candidates,id',
            'job_posting_id' => 'required|exists:job_postings,id',
        ];
    }

    public function messages(): array
    {
        return [
            'candidate_id.required' => 'alan zorunludur.',
            'candidate_id.exists' => 'aday mevcut değil.',
            'job_posting_id.required' => 'ilanı id alanı zorunludur.',
            'job_posting_id.exists' => 'ilan mevcut değil.',
        ];
    }
}