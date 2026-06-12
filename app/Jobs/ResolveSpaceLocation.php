<?php

namespace App\Jobs;

use App\Models\Space;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class ResolveSpaceLocation implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public int $backoff = 10;

    public function __construct(public Space $space) {}

    public function handle(): void
    {
        if ($this->space->location || ! $this->space->latitude || ! $this->space->longitude) {
            return;
        }

        $response = Http::withHeaders(['User-Agent' => 'BuzSpace/1.0'])
            ->get('https://nominatim.openstreetmap.org/reverse', [
                'lat' => $this->space->latitude,
                'lon' => $this->space->longitude,
                'format' => 'json',
                'zoom' => 16,
            ]);

        if ($response->successful() && $response->json('display_name')) {
            $this->space->update(['location' => $response->json('display_name')]);
        }
    }
}
