<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCenter extends Model
{
    use HasFactory;

    protected $table = 'medical_centers';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];
}
