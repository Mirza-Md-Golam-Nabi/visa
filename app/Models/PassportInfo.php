<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PassportInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'passport_infos';
    protected $fillable = [
        'personal_info_id',
        'passport_no',
        'passport_issue_date',
        'passport_issue_place',
        'validity',
    ];

}
