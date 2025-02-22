<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Options;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages'; // Table name

    // Mass assignable attributes
    protected $fillable = [
        'title',
        'image',
        'description',
    ];
}
