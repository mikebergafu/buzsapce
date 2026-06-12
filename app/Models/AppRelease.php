<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppRelease extends Model
{
    protected $fillable = ['version', 'platform', 'file_path', 'release_notes'];

    public function getDownloadUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->file_path);
    }
}
