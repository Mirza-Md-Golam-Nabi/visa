<?php

namespace App\Models;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = ['division_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
