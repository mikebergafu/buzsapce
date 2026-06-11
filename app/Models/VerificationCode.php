<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $identifier
 * @property string $code
 * @property Carbon $expires_at
 * @property Carbon|null $verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class VerificationCode extends Model
{
    /** @var list<string> */
    protected $fillable = [
        'identifier',
        'code',
        'expires_at',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'verified_at' => 'datetime',
        ];
    }

    /**
     * Generate a new verification code for the given identifier.
     */
    public static function generate(string $identifier): self
    {
        // Invalidate previous unused codes
        static::where('identifier', $identifier)
            ->whereNull('verified_at')
            ->delete();

        return static::create([
            'identifier' => $identifier,
            'code' => str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'expires_at' => now()->addMinutes(10),
        ]);
    }

    /**
     * Verify a code for the given identifier.
     */
    public static function verify(string $identifier, string $code): bool
    {
        $affected = static::where('identifier', $identifier)
            ->where('code', $code)
            ->whereNull('verified_at')
            ->where('expires_at', '>', now())
            ->limit(1)
            ->update(['verified_at' => now()]);

        return $affected > 0;
    }
}
