<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LucasDotVin\Soulbscription\Models\Plan;

class Plandetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'description',
        'price',
    ];

    // Define the inverse relationship
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
