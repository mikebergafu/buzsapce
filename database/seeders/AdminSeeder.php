<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'mikebergafu@gmail.com'],
            [
                'name' => 'Mike Bergafu',
                'password' => 'password',
            ],
        );
    }
}
