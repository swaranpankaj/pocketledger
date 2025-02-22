<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\Models\User;

class PersonalInformation extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name follows Laravel's naming conventions)
    protected $table = 'personal_information';

    // Disable auto-incrementing the primary key (because 'id' is bigint)
    public $incrementing = false;

    // Define the primary key column
    protected $primaryKey = 'id';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'document_type',
        'document_number',
        'expire_date',
        'location_of_item',
        'additional_notes',
        'image',
    ];

    // Define the attributes that should be cast to native types
    protected $casts = [
        'expire_date' => 'date', // Automatically cast to Carbon date
        'created_at' => 'datetime', // Automatically cast to Carbon instance
        'updated_at' => 'datetime', // Automatically cast to Carbon instance
    ];

    // If the timestamps are not set automatically, use this
    public $timestamps = true;


    public function document()
    {
        return $this->belongsTo(Document::class, 'document_type','id'); // Assuming foreign key is 'document_id'
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id'); // Assuming foreign key is 'document_id'
    }
}
