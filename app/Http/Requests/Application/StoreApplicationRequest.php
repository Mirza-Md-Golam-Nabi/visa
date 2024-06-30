<?php

namespace App\Http\Requests\Application;

use App\Enums\AgentGroupEnum;
use App\Enums\AgentTypeEnum;
use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Enums\PassportTypeEnum;
use App\Enums\ReligionEnum;
use App\Rules\NationalId;
use App\Rules\PhoneNumber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "agent" => [
                "required",
                Rule::exists('agents', 'id')->where(function (Builder $query) {
                    return $query->where('agent_type', AgentTypeEnum::PASSENGER_AGENT);
                }),
            ],
            "passenger_name" => ["required", "string", "max:250"],
            "nid_no" => ["nullable", new NationalId],
            "gender" => ["required", Rule::enum(GenderEnum::class)],
            "dob" => ["required", "date"],
            "father_name" => ["required", "string", "max:250"],
            "mother_name" => ["required", "string", "max:250"],
            "spouse_name" => ["nullable", "string", "max:250"],
            "religion" => ["required", Rule::enum(ReligionEnum::class)],
            "marital_status" => ["required", Rule::enum(MaritalStatusEnum::class)],
            "target_country" => ["required", 'in:Saudi Arabia'],
            "passenger_type" => ["required", Rule::enum(AgentGroupEnum::class)],
            "village_house" => ["nullable", "string", "max:250"],
            "visa_no" => ["nullable"],
            "division_id" => ["required", 'exists:divisions,id'],
            "district_id" => [
                "required",
                Rule::exists('districts', 'id')->where(function (Builder $query) {
                    return $query->where('division_id', $this->division_id);
                }),
            ],
            "police_station" => ["required", "string", "max:250"],
            "post_office" => ["nullable", "string", "max:250"],
            "contact_no" => ["required", new PhoneNumber],
            "current_status" => ["nullable", Rule::enum(PassengerCurrentStatusEnum::class)],
            "emergency_name_contact" => ["nullable", "string", "max:250"],
            "recruiting_agent" => [
                "nullable",
                Rule::exists('agents', 'id')->where(function (Builder $query) {
                    return $query->where('agent_type', AgentTypeEnum::SERVICE_AGENT);
                }),
            ],
            "passenger_picture" => ["nullable", "image"],
            "previous_passport" => ["nullable", "string", "max:250"],
            "passport_no" => ["required", "string", "max:250"],
            "passport_type" => ["required", Rule::enum(PassportTypeEnum::class)],
            "passport_issue_date" => ["required", "date"],
            "passport_issue_place" => ["required", "exists:districts,id"],
            "passport_expire_date" => ["required", "date"],
            "passport_picture" => ["nullable", "image"],
            "visa_info_id" => ["required", "exists:visa_infos,id"],
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
