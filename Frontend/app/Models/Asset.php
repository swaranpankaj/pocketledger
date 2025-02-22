<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets'; // Specify table name if different

    protected $fillable = ['name']; // Allow mass assignment

    public $timestamps = true; // Enable timestamps
}
