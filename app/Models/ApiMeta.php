<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMeta extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'related_table', 'get_endpoint', 'post_endpoint', 'post_sample', 'update_endpoint', 'delete_endpoint'];
}
