<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavingsGoalRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'target_amount' => 'requred|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'target_date' => 'required|date|after_or_equal:today'
        ];
    }
}
