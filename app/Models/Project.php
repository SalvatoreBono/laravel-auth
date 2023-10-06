<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
        "date" => "date",
    ];
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "link",
        "date",
        "language",
    ];
}
