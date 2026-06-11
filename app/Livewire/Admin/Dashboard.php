<?php

namespace App\Livewire\Admin;

use App\Models\Space;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalUsers' => User::count(),
            'totalSpaces' => Space::count(),
            'availableSpaces' => Space::where('is_available', true)->count(),
            'recentUsers' => User::latest()->take(5)->get(),
        ]);
    }
}
