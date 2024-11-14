<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropProductionData extends Model
{
    use HasFactory;

    protected $fillable = [
        'State_Name',
        'District_Name',
        'Crop_Year',
        'Season',
        'Crop',
        'Area',
        'Production',
        'user_id'  // Add user_id to fillable fields
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
