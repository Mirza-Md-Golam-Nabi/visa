<?php

namespace App\Http\Requests\Medical;

use App\Enums\BioSubmissionStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMedicalRequest extends FormRequest
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
            'passenger_id' => ['required', 'exists:passengers,id'],
            'medical_center_id' => [
                'required',
                'exists:medical_centers,id',
            ],
            'medical_serial_no' => ['required'],
            'medical_exam_issue_date' => ['required', 'date'],
            'medical_report_expire_date' => ['required', 'date'],
            'medical_status' => [
                'required',
                Rule::enum(PassengerCurrentStatusEnum::class),
            ],
            'mofa_number' => ['required'],
            'current_status' => [
                'required',
                Rule::enum(PassengerCurrentStatusEnum::class),
            ],
            'comment' => ['required'],
            'bio_submit_date' => ['required', 'date'],
            'bio_submit_status' => [
                'required',
                Rule::enum(BioSubmissionStatusEnum::class),
            ],
            'calling_date' => ['required', 'date'],
            'calling_status' => ['required', 'in:No,Yes'],
            'medical_receipt' => ['nullable'],
            'medical_certificate' => ['nullable'],
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
