<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nominee extends Model
{
    use HasFactory;

    protected $table = 'nominees'; // Table name
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'relationship',
    ];
}
