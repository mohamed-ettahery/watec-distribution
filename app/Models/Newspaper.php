<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'en_title', 'en_slug', 'en_description', 'newspaper_date', 'image', 'document'];
}
