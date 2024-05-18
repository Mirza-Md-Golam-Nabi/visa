<?php

namespace App\Http\Requests\Application;

use App\Rules\PhoneNumber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:250'],
            'father_name' => ['nullable', 'string', 'max:250'],
            'mother_name' => ['nullable', 'string', 'max:250'],
            'dob' => ['required', 'date_format:Y-m-d'],
            'birth_place' => ['required', 'string', 'max:250'],
            'mofa_new_id' => ['required', 'string', 'max:250'],
            'mofa_old_id' => ['nullable', 'string', 'max:250'],
            'previous_nationality' => ['nullable', 'string', 'max:250'],
            'present_nationality' => ['nullable', 'string', 'max:250'],
            'gender' => ['required', 'string', 'max:30'],
            'marital_status' => ['required', 'string', 'max:30'],
            'sect' => ['nullable', 'string', 'max:250'],
            'religion' => ['required', 'string', 'max:30'],
            'present_address' => ['nullable', 'string', 'max:250'],
            'permanent_address' => ['nullable', 'string', 'max:250'],
            'phone' => ['nullable', new PhoneNumber],
            'passport_no' => ['required', 'string', 'max:250'],
            'passport_issue_date' => ['required', 'date_format:Y-m-d'],
            'passport_issue_place' => ['nullable', 'string', 'max:250'],
            'validity' => ['required', 'string', 'max:10'],
            'visa_no' => ['required', 'string', 'max:250'],
            'visa_date' => ['required', 'date_format:Y-m-d'],
            'sponsor_name' => ['required', 'string', 'max:250'],
            'sponsor_id' => ['required', 'string', 'max:250'],
            'visa_issue_place' => ['nullable', 'string', 'max:250'],
            'qualification' => ['nullable', 'string', 'max:250'],
            'profession' => ['required', 'string', 'max:250'],
            'travel_purpose' => ['nullable', 'string', 'max:30'],
            'musaned_no' => ['nullable', 'string', 'max:250'],
            'wakala_no' => ['required', 'string', 'max:250'],
            'stay_duration' => ['nullable', 'string', 'max:10'],
            'arrival_date' => ['nullable', 'date_format:Y-m-d'],
            'departure_date' => ['nullable', 'date_format:Y-m-d'],
            'pc_ref_no' => ['required', 'string', 'max:250'],
            'license_type' => ['nullable', 'string', 'max:250'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'pc_ref_no' => 'police reference no',
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
