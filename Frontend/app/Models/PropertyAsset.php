<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyAsset extends Model
{
    use HasFactory;

    protected $table = 'property_assets'; // Table name
    
    // Specify the primary key if it differs from 'id'
    protected $primaryKey = 'id';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'type_of_assets',
        'label_your_property',
        'address_1',
        'address_2',
        'country',
        'state',
        'zip_code',
        'own_or_rent',
        'deed_storage_location',
        'ownership_structure',
        'additional_notes',
        'document_image',
        'insurance_company_name',
        'policy_number',
        'policy_document_location',
        'insurance_types',
        'security_company_name',
        'account_number',
        'phone_safe_word',
        'extra_keys_location',
    ];

    // Optional: Specify date fields for automatic casting
    protected $dates = ['created_at', 'updated_at'];
}
