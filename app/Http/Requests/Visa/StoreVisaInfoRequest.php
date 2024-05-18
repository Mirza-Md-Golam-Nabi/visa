<?php

namespace App\Http\Requests\Visa;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreVisaInfoRequest extends FormRequest
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
            'passenger_agent_name' => ['required', 'string', 'max:250'],
            'service_agent_name' => ['required', 'string', 'max:250'],
            'visa_no' => ['required', 'string', 'max:250'],
            'category' => ['required', 'string', 'max:250'],
            'quantity' => ['required', 'string', 'max:250'],
            'visa_date' => ['required', 'date_format:Y-m-d'],
            'sponsor_name' => ['required', 'string', 'max:250'],
            'sponsor_id' => ['required', 'string', 'max:250'],
            'visa_issue_place' => ['nullable', 'string', 'max:250'],
            'qualification' => ['nullable', 'string', 'max:250'],
            'profession' => ['required', 'string', 'max:250'],
            'travel_purpose' => ['nullable', 'string', 'max:30'],
            'musaned_no' => ['nullable', 'string', 'max:250'],
            'wakala_no' => ['required', 'string', 'max:250'],
            'group_no' => ['required', 'string', 'max:250'],
            'copile_name_arabic' => ['required', 'string', 'max:250'],
            'comment' => ['required', 'string', 'max:250'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function failedValidation(Validator $validator)
    {
        $response = null;

        if ($this->is('api/*')) {
            $response = failedValidationForApi($validator);
        }

        $exception = $validator->getException();

        throw (new $exception($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
