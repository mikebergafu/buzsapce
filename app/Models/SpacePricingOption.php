<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['space_id', 'type', 'amount'])]
class SpacePricingOption extends Model
{
    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }
}
