<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProfile extends Model
{
    use SoftDeletes;
    protected $table = 'company_profile';
    protected $fillable = [
        'name',
        'vision',
        'mission',
        'about',
        'created_at',
        'updated_at',
    ];
}
