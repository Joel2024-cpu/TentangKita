<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    // Bagian ini PENTING agar tidak error MassAssignmentException
    protected $fillable = [
        'title',
        'content',
        'story_date',
        'image',
    ];
}
