<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sub_categry(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function home_slider(): BelongsToMany
    {
        return $this->belongsToMany(Home_slider::class, 'home_slider_categories')->withTimestamps();
    }
}
