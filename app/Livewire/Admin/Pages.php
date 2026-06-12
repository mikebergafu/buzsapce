<?php

namespace App\Livewire\Admin;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('Pages')]
class Pages extends Component
{
    public ?string $editing = null;

    public string $title = '';

    public string $content = '';

    public function edit(string $slug): void
    {
        $page = Page::firstOrCreate(
            ['slug' => $slug],
            ['title' => ucwords(str_replace('-', ' ', $slug)), 'content' => ''],
        );

        $this->editing = $slug;
        $this->title = $page->title;
        $this->content = $page->content;
    }

    public function save(): void
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Page::updateOrCreate(
            ['slug' => $this->editing],
            ['title' => $this->title, 'content' => $this->content],
        );

        $this->editing = null;
        $this->dispatch('toast', message: 'Page updated successfully.');
    }

    public function cancel(): void
    {
        $this->editing = null;
    }

    public function render()
    {
        return view('livewire.admin.pages', [
            'pages' => Page::all(),
        ]);
    }
}
