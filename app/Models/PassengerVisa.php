<?php

namespace App\Models;

use App\Models\Passenger;
use App\Models\VisaInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PassengerVisa extends Pivot
{
    use HasFactory;

    protected $table = 'passenger_visas';
    protected $fillable = [
        'passenger_id',
        'visa_info_id',
        'visa_issue_date',
        'mofa_number',
        'stamp_submit_date',
        'visa_stamping_date',
        'embassy_attest',
        'finger_status',
        'police_clearance_number',
        'musanad',
        'delivery_date',
        'recruiting_agency',
        'sponsor_name_arabic',
        'sponsor_name_english',
        'profession_arabic',
        'profession_english',
        'salary',
        'visa_stamp',
        'ministry_permission',
        'okala_number',
        'current_status',
        'visa_status',
        'enjaz_visa_copy',
        'visa_stamp_copy',
    ];

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'id');
    }

    public function visa_info(): BelongsTo
    {
        return $this->belongsTo(VisaInfo::class, 'visa_info_id', 'id');
    }
}
