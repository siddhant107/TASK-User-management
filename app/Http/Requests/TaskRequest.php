<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $rules = [
            'task_name' => 'required|string|between:3,32',
            'task_description' => 'required|string',
            'task_start_date' => 'date|date_format:Y-m-d',
            'task_created_by' => 'numeric',
            'task_done' => 'boolean',
        ];

        if ($this->isMethod('put')) {
            // Additional rules for update request
            $rules['task_end_date'] = 'nullable|date|date_format:Y-m-d';
        }

        return $rules;
    }
}
