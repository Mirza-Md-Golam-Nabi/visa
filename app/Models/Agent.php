<?php

namespace App\Models;

use App\Enums\AgentGroupEnum;
use App\Enums\AgentTypeEnum;
use App\Enums\GenderEnum;
use App\Models\District;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'agents';

    protected $fillable = [
        'agent_type',
        'agent_group',
        'name',
        'nid_no',
        'gender',
        'father_name',
        'mother_name',
        'village_house',
        'road_block_sector',
        'country',
        'division_id',
        'district_id',
        'police_station',
        'email',
        'post_office',
        'contact_no',
        'emergency_name_phone',
        'agent_image',
    ];

    protected $casts = [
        'agent_type' => AgentTypeEnum::class,
        'agent_group' => AgentGroupEnum::class,
        'gender' => GenderEnum::class,
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
