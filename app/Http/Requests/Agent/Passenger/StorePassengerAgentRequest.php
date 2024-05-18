<?php

namespace App\Http\Requests\Agent\Passenger;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StorePassengerAgentRequest extends FormRequest
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
            'agent_group' => ['required', 'string'],
            'name' => ['required', 'string'],
            'nid_no' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'village_house' => ['required', 'string'],
            'road_block_sector' => ['required', 'string'],
            'country' => ['required', 'string'],
            'division' => ['required', 'string'],
            'district' => ['required', 'string'],
            'police_station' => ['required', 'string'],
            'email' => ['required', 'string'],
            'post_office' => ['required', 'string'],
            'contact_no' => ['required', 'string'],
            'emergency_name_phone' => ['required', 'string'],
            'agent_image' => ['nullable', 'images'],
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
