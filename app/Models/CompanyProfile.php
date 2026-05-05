<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
    'company_name', 'headline', 'subheadline', 'about', 'vision',
    'mission', 'phone', 'whatsapp', 'email', 'address',
    'ojk_text', 'lps_text'
    ];
}
