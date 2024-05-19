<?php

namespace App\Http\Requests\Agent;

use App\Enum\AgentGroupEnum;
use App\Enum\AgentTypeEnum;
use App\Enum\GenderEnum;
use App\Rules\NationalId;
use App\Rules\PhoneNumber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgentRequest extends FormRequest
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
            'agent_type' => ['required', Rule::enum(AgentTypeEnum::class)],
            'agent_group' => ['required', Rule::enum(AgentGroupEnum::class)],
            'name' => ['required', 'string'],
            'nid_no' => ['required', new NationalId],
            'gender' => ['required', Rule::enum(GenderEnum::class)],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'village_house' => ['required', 'string'],
            'road_block_sector' => ['required', 'string'],
            'country' => ['required', 'in:Bangladesh'],
            'division_id' => ['required', 'exists:divisions,id'],
            'district_id' => [
                'required',
                Rule::exists('districts', 'id')->where(function (Builder $query) {
                    return $query->where('division_id', $this->division_id);
                }),
            ],
            'police_station' => ['required', 'string'],
            'email' => ['required', 'string'],
            'post_office' => ['required', 'string'],
            'contact_no' => ['required', new PhoneNumber],
            'emergency_name_phone' => ['required', 'string'],
            'agent_image' => ['nullable', 'image'],
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
