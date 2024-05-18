<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceAgent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_agents';
    protected $fillable = [
        'agent_group',
        'name',
        'nid_no',
        'gender',
        'father_name',
        'mother_name',
        'village_house',
        'road_block_sector',
        'country',
        'division',
        'district',
        'police_station',
        'email',
        'post_office',
        'contact_no',
        'emergency_name_phone',
        'agent_image',
    ];
}
