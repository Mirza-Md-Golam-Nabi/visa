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
}
