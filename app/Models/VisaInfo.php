<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisaInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visa_infos';
    protected $fillable = [
        'passenger_agent_name',
        'service_agent_name',
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
}
