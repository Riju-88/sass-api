<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LucasDotVin\Soulbscription\Models\Concerns\HasSubscriptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cropProductionData()
    {
        return $this->hasMany(CropProductionData::class);
    }

    public function science()
    {
        return $this->hasMany(Science::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function documentary()
    {
        return $this->hasMany(Documentary::class);
    }

    public function topRatedMovies()
    {
        return $this->hasMany(TopRatedMovies::class);
    }

    public function annualTemperature()
    {
        return $this->hasMany(AnnualTemperature::class);
    }

    public function steam2024Bestrevenue1500()
    {
        return $this->hasMany(Steam2024Bestrevenue1500::class);
    }
}
