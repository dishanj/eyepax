<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesUsers extends Model
{
    use HasFactory;
    protected $table = "sales_users"; 
    protected $fillable = [
        'name',
        'emailAddress',
        'telephoneNumbers',
        'joinedDates',
        'currentRoutes',
        'comments',
        'is_active'
    ];
}
