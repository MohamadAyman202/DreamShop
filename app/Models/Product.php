<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(TaxRule::class, 'tax_rule_id');
    }

    public function bundle(): BelongsTo
    {
        return $this->belongsTo(BundleDeals::class, 'bundle_deal_id');
    }

    public function collection(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }

    public function flash_sale(): BelongsToMany
    {
        return $this->belongsToMany(Flash_sale::class, 'flash_sale_product')->withTimestamps();
    }

    public function home_slider():BelongsToMany {
        return $this->belongsToMany(Home_slider::class, 'home_slider_products')->withTimestamps();
    }
}
