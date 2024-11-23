<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMeta extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'related_table'];
}
