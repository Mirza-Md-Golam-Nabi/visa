<?php

namespace App\Models;

use App\Enum\VisaCategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisaInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visa_infos';
    protected $fillable = [
        'country',
        'passenger_agent_id',
        'service_agent_id',
        'visa_no',
        'category',
        'quantity',
        'visa_date',
        'sponsor_name',
        'sponsor_id',
        'visa_issue_place',
        'qualification',
        'profession',
        'travel_purpose',
        'musaned_no',
        'wakala_no',
        'group_no',
        'copile_name_arabic',
        'comment',
    ];

    protected $casts = [
        'category' => VisaCategoryEnum::class,
    ];

    public function service_agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'service_agent_id', 'id');
    }

    public function passenger_agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'passenger_agent_id', 'id');
    }
}
