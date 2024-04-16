<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_infos';
    protected $fillable = [
        'full_name',
        'father_name',
        'mother_name',
        'dob',
        'mofa_id',
        'birth_place',
        'previous_nationality',
        'present_nationality',
        'gender_id',
        'marital_status_id',
        'sect',
        'religion_id',
        'address_id',
        'phone',
    ];
}
