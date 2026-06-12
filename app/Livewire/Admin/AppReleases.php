<?php

namespace App\Livewire\Admin;

use App\Models\AppRelease;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
#[Title('App Releases')]
class AppReleases extends Component
{
    use WithFileUploads;

    public bool $showForm = false;

    #[Validate('required|string|max:20')]
    public string $version = '';

    #[Validate('required|in:android,ios')]
    public string $platform = 'android';

    #[Validate('required|file|max:204800')]
    public $file;

    public string $release_notes = '';

    public function upload(): void
    {
        $this->validate();

        $extension = $this->platform === 'android' ? 'apk' : 'ipa';
        $path = $this->file->storeAs(
            'releases',
            "buzspace-v{$this->version}.{$extension}",
            'public'
        );

        AppRelease::create([
            'version' => $this->version,
            'platform' => $this->platform,
            'file_path' => $path,
            'release_notes' => $this->release_notes ?: null,
        ]);

        $this->reset(['version', 'platform', 'file', 'release_notes', 'showForm']);
        $this->dispatch('toast', message: 'App uploaded successfully.');
    }

    public function delete(int $id): void
    {
        $release = AppRelease::findOrFail($id);
        Storage::disk('public')->delete($release->file_path);
        $release->delete();
        $this->dispatch('toast', message: 'Release deleted.');
    }

    public function render()
    {
        return view('livewire.admin.app-releases', [
            'releases' => AppRelease::latest()->get(),
        ]);
    }
}
