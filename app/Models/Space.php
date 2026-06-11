<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'structure_type', 'description', 'location', 'latitude', 'longitude', 'width', 'length', 'dimension_unit', 'image_url', 'price', 'pricing_type', 'commission_rate', 'is_available', 'user_id'])]
class Space extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pricingOptions(): HasMany
    {
        return $this->hasMany(SpacePricingOption::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(SpaceImage::class);
    }
}
