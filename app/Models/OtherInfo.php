<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'other_infos';
    protected $fillable = [
        'personal_info_id',
        'stay_duration',
        'arrival_date',
        'departure_date',
    ];

}
