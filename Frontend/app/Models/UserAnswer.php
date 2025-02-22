<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserAnswer extends Model
{
    use HasFactory;

    protected $table = 'user_answers'; // Table name

    // Mass assignable attributes
    protected $fillable = [
        "user_id",
        "question_id",
        "answer_id",
    ];

}
