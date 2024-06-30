<?php

namespace App\Models;

use App\Enums\BioSubmissionStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Models\MedicalCenter;
use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medicals';

    protected $fillable = [
        'passenger_id',
        'medical_center_id',
        'medical_serial_no',
        'medical_exam_issue_date',
        'medical_report_expire_date',
        'medical_status',
        'mofa_number',
        'current_status',
        'comment',
        'bio_submit_date',
        'bio_submit_status',
        'calling_date',
        'calling_status',
        'medical_receipt',
        'medical_certificate',
    ];

    protected $casts = [
        'medical_status' => PassengerCurrentStatusEnum::class,
        'current_status' => PassengerCurrentStatusEnum::class,
        'bio_submit_status' => BioSubmissionStatusEnum::class,
    ];

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'id');
    }

    public function medical_center(): BelongsTo
    {
        return $this->belongsTo(MedicalCenter::class, 'medical_center_id', 'id');
    }
}
