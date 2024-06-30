<?php

namespace App\Http\Requests\PassengerVisa;

use App\Enums\EmbassyAttestEnum;
use App\Enums\FingerStatusEnum;
use App\Enums\MinistryPermissionEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Enums\VisaStampEnum;
use App\Enums\VisaStatusEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePassengerVisaRequest extends FormRequest
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
            'id' => ['required', 'exists:passenger_visas'],
            'passenger_id' => ['required'],
            'visa_info_id' => ['required'],
            'visa_issue_date' => ['required', 'date'],
            'mofa_number' => ['required'],
            'stamp_submit_date' => ['required', 'date'],
            'visa_stamping_date' => ['required', 'date'],
            'embassy_attest' => ['required', Rule::enum(EmbassyAttestEnum::class)],
            'finger_status' => ['required', Rule::enum(FingerStatusEnum::class)],
            'police_clearance_number' => ['required'],
            'musanad' => ['required'],
            'delivery_date' => ['required', 'date'],
            'recruiting_agency' => ['required'],
            'sponsor_name_arabic' => ['required'],
            'sponsor_name_english' => ['required'],
            'profession_arabic' => ['required'],
            'profession_english' => ['required'],
            'salary' => ['required'],
            'visa_stamp' => ['required', Rule::enum(VisaStampEnum::class)],
            'ministry_permission' => ['required', Rule::enum(MinistryPermissionEnum::class)],
            'okala_number' => ['required'],
            'current_status' => ['required', Rule::enum(PassengerCurrentStatusEnum::class)],
            'visa_status' => ['required', Rule::enum(VisaStatusEnum::class)],
            'enjaz_visa_copy' => ['nullable'],
            'visa_stamp_copy' => ['nullable'],
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
