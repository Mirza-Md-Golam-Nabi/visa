<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPurpose extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'travel_purposes';
    protected $fillable = ['title'];
}
