<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Site extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'site';

    protected $fillable = [
        "business_name",
        "business_domain",
        "site_address",
        "site_postal_code",
        "site_latitude",
        "site_longitude"
    ];
}
