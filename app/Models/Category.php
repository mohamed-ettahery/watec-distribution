<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
// use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    // use NodeTrait;

    // protected $parentColumn = 'parent_id';
    // protected $leftColumn = 'lft';
    protected $fillable = ['name', 'en_name', 'slug', 'en_slug', 'image', 'parent_id'];
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function getRouteKeyName()
    {
        $request = request();
        // return app()->getLocale() == 'en' ? 'en_slug' : 'slug';
        // $locale = Session::get("locale") ? Session::get("locale") : "fr";
        $locale = "";
        if (strpos($request->url(), '/en') !== false) {
            $locale = 'en';
        } else {
            $locale = 'fr';
        }
        // switch (app()->getLocale()) {
        switch ($locale) {
            case 'en':
                return "en_slug";
                break;
            case 'fr':
                return "slug";
                break;
            default:
                return "slug";
                break;
        }
    }
    public function getCurrentLocale()
    {
        return app()->getLocale();
    }
    public function hasProducts()
    {
        if ($this->products()->exists()) {
            return true;
        }

        foreach ($this->children as $subcategory) {
            if ($subcategory->hasProducts()) {
                return true;
            }
        }

        return false;
        // return $this->hasMany(Product::class, 'category_id');
    }
    public function getChildIds()
    {
        $ids = [];

        foreach ($this->childs as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $child->getChildIds());
        }

        return $ids;
    }
}
