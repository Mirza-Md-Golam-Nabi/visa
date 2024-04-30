<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personal_infos';
    protected $fillable = [
        'full_name',
        'father_name',
        'mother_name',
        'dob',
        'birth_place',
        'mofa_new_id',
        'mofa_old_id',
        'previous_nationality',
        'present_nationality',
        'gender',
        'marital_status',
        'sect',
        'religion',
        'present_address',
        'permanent_address',
        'phone',
    ];

    public function passport_info(): HasOne
    {
        return $this->hasOne(PassportInfo::class);
    }

    public function visa_info(): HasOne
    {
        return $this->hasOne(VisaInfo::class);
    }

    public function legal_document(): HasOne
    {
        return $this->hasOne(LegalDocument::class);
    }

    public function other_info(): HasOne
    {
        return $this->hasOne(OtherInfo::class);
    }
}
