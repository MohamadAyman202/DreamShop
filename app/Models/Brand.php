<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function home_slider(): BelongsToMany
    {
        return $this->belongsToMany(Home_slider::class, 'home_slider_brands')->withTimestamps();
    }
}
