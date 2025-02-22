<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Options extends Model
{
    use HasFactory;

    protected $table = 'onboarding_options'; // Table name

    // Mass assignable attributes
    protected $fillable = [
        "question_id",
        "options",
    ];

}
