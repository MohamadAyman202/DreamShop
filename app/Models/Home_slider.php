<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Home_slider extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'home_slider_categories')->withTimestamps();
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'home_slider_brands')->withTimestamps();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'home_slider_products')->withTimestamps();
    }

    public function sub_categories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'home_slider_sub_categories')->withTimestamps();
    }
}
