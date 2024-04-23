<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDocument extends Model
{
    use HasFactory;

    protected $table = 'legal_documents';
    protected $fillable = [
        'personal_info_id',
        'pc_ref_no',
        'license_type',
    ];

}
