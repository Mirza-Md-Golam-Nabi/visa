<?php

namespace App\Http\Requests\Visa;

use App\Enums\AgentTypeEnum;
use App\Enums\VisaCategoryEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'country' => ['required', 'in:Saudi Arabia'],
            'passenger_agent_id' => [
                'required',
                Rule::exists('agents', 'id')
                    ->where(function (Builder $query) {
                        return $query->where('agent_type', AgentTypeEnum::PASSENGER_AGENT);
                    }),
            ],
            'service_agent_id' => [
                'required',
                Rule::exists('agents', 'id')
                    ->where(function (Builder $query) {
                        return $query->where('agent_type', AgentTypeEnum::SERVICE_AGENT);
                    }),
            ],
            'visa_no' => ['required', 'string', 'max:250'],
            'category' => ['required', Rule::enum(VisaCategoryEnum::class)],
            'quantity' => ['required', 'integer'],
            'sponsor_id' => ['required', 'string', 'max:250'],
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
