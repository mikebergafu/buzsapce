<?php

namespace Database\Seeders;

use App\Models\Space;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    public function run(): void
    {
        $spaces = [
            [
                'name' => 'Osu Oxford Street Shop',
                'description' => 'Prime retail space on the busiest street in Osu. High foot traffic, ideal for fashion or electronics.',
                'location' => 'Osu, Accra',
                'price' => 2500.00,
                'image_url' => null,
            ],
            [
                'name' => 'Madina Market Stall',
                'description' => 'Affordable market stall near the main entrance. Great for provisions and daily essentials.',
                'location' => 'Madina, Accra',
                'price' => 800.00,
                'image_url' => null,
            ],
            [
                'name' => 'East Legon Plaza Unit',
                'description' => 'Modern air-conditioned unit in a busy shopping plaza. Suitable for a salon or boutique.',
                'location' => 'East Legon, Accra',
                'price' => 4500.00,
                'image_url' => null,
            ],
            [
                'name' => 'Kumasi Adum Container',
                'description' => 'Container shop in the heart of Adum commercial district. Perfect for phone accessories.',
                'location' => 'Adum, Kumasi',
                'price' => 600.00,
                'image_url' => null,
            ],
            [
                'name' => 'Takoradi Market Circle Booth',
                'description' => 'Open booth space in the renovated Market Circle. Ideal for food vendors.',
                'location' => 'Takoradi',
                'price' => 500.00,
                'image_url' => null,
            ],
        ];

        foreach ($spaces as $space) {
            Space::create($space);
        }
    }
}
