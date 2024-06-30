<?php

namespace App\Models;

use App\Enums\AgentGroupEnum;
use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Enums\ReligionEnum;
use App\Models\District;
use App\Models\Division;
use App\Models\Passport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'passengers';
    protected $fillable = [
        "agent",
        "passenger_name",
        "nid_no",
        "gender",
        "dob",
        "father_name",
        "mother_name",
        "spouse_name",
        "religion",
        "marital_status",
        "target_country",
        "passenger_type",
        "village_house",
        "division_id",
        "district_id",
        "police_station",
        "post_office",
        "contact_no",
        "current_status",
        "emergency_name_contact",
        "recruiting_agent",
        "passenger_picture",
    ];

    protected $casts = [
        'gender' => GenderEnum::class,
        'religion' => ReligionEnum::class,
        'marital_status' => MaritalStatusEnum::class,
        'passenger_type' => AgentGroupEnum::class,
        'current_status' => PassengerCurrentStatusEnum::class,
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function passport(): HasOne
    {
        return $this->hasOne(Passport::class, 'passenger_id', 'id');
    }

    public function passenger_agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent', 'id')->select('id', 'name');
    }

    public function service_agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'recruiting_agent', 'id')->select('id', 'name');
    }

    public function medical(): HasOne
    {
        return $this->hasOne(Medical::class, 'passenger_id', 'id');
    }

    public function visa(): HasOneThrough
    {
        return $this->hasOneThrough(
            VisaInfo::class,
            PassengerVisa::class,
            'passenger_id',
            'id',
            'id',
            'visa_info_id'
        );
    }
}
