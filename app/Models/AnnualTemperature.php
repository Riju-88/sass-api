<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualTemperature extends Model
{
    use HasFactory;

    protected $table = 'annual_temperature';

    protected $fillable = [
        'country',
        'Year',
        'Temperature_anomaly',
        'user_id',
    ];

    protected $casts = [
        'Year' => 'integer',
        'Temperature_anomaly' => 'decimal:12',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
