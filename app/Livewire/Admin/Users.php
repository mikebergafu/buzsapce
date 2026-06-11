<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
#[Title('Users')]
class Users extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public function toggleAdmin(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->update(['is_admin' => ! $user->is_admin]);
        $this->dispatch('toast', message: $user->is_admin ? 'User promoted to admin.' : 'Admin role removed.');
    }

    public function deleteUser(int $userId): void
    {
        User::where('id', $userId)->where('is_admin', false)->delete();
        $this->dispatch('toast', message: 'User deleted.');
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('phone', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(15);

        return view('livewire.admin.users', ['users' => $users]);
    }
}
