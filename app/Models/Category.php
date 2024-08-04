<?php

namespace App\Models;

use App\CategoryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    protected $casts = [
        'type' => CategoryType::class,
    ];
}
