<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'en_name', 'slug', 'en_slug', 'description', 'en_description', 'details', 'en_details', 'image', 'document', 'promotion', 'status', 'category_id', 'mark_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }
}
