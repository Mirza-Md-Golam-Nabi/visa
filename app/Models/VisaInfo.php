<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaInfo extends Model
{
    use HasFactory;

    protected $table = 'visa_infos';
    protected $fillable = [
        'personal_info_id',
        'visa_no',
        'visa_date',
        'sponsor_name',
        'sponsor_id',
        'visa_issue_place',
        'qualification',
        'profession',
        'travel_purpose',
        'musaned_no',
        'wakala_no',
    ];
}
