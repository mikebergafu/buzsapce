<?php

namespace App\Livewire\Admin;

use App\Models\Space;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
#[Title('Spaces')]
class Spaces extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public function toggleAvailability(int $spaceId): void
    {
        $space = Space::findOrFail($spaceId);
        $space->update(['is_available' => ! $space->is_available]);
        $this->dispatch('toast', message: $space->is_available ? 'Space marked available.' : 'Space marked taken.');
    }

    public function deleteSpace(int $spaceId): void
    {
        Space::findOrFail($spaceId)->delete();
        $this->dispatch('toast', message: 'Space deleted.');
    }

    public function render()
    {
        $spaces = Space::query()
            ->with('user')
            ->when($this->search, fn ($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('location', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(15);

        return view('livewire.admin.spaces', ['spaces' => $spaces]);
    }
}
