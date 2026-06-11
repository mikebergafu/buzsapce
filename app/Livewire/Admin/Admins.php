<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('Admins')]
class Admins extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email|unique:admins,email')]
    public string $email = '';

    #[Validate('required|min:8')]
    public string $password = '';

    public bool $showForm = false;

    public function create(): void
    {
        $this->validate();

        Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name', 'email', 'password', 'showForm']);
    }

    public function delete(int $id): void
    {
        if ($id === Auth::guard('admin')->id()) {
            return; // Can't delete yourself
        }

        Admin::where('id', $id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.admins', [
            'admins' => Admin::latest()->get(),
        ]);
    }
}
