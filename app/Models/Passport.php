<?php

namespace App\Models;

use App\Enums\PassportTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passport extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'passports';
    protected $fillable = [
        'passenger_id',
        'previous_passport',
        'passport_no',
        'passport_type',
        'passport_issue_date',
        'passport_issue_place',
        'passport_expire_date',
        'passport_picture',
    ];

    protected $casts = [
        'passport_type' => PassportTypeEnum::class,
    ];

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'id');
    }

    public function passport_issue(): BelongsTo
    {
        return $this->belongsTo(District::class, 'passport_issue_place', 'id');
    }
}
