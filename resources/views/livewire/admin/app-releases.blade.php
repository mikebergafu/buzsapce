<div>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold">App Releases</h2>
        <button wire:click="$toggle('showForm')" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors">
            {{ $showForm ? 'Cancel' : 'Upload New' }}
        </button>
    </div>

    @if($showForm)
        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800 mb-6">
            <form wire:submit="upload" class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Version</label>
                        <input wire:model="version" type="text" placeholder="1.0.0" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @error('version') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Platform</label>
                        <select wire:model="platform" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="android">Android (APK)</option>
                            <option value="ios">iOS (IPA)</option>
                        </select>
                    </div>
                </div>
                <div x-data="{ uploading: false, progress: 0 }"
                     x-on:livewire-upload-start="uploading = true"
                     x-on:livewire-upload-finish="uploading = false; progress = 0"
                     x-on:livewire-upload-cancel="uploading = false; progress = 0"
                     x-on:livewire-upload-error="uploading = false; progress = 0"
                     x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">App File</label>
                    <input wire:model="file" type="file" accept=".apk,.ipa,.aab" class="w-full text-sm text-zinc-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    <p class="mt-1 text-xs text-zinc-400">Max file size: {{ ini_get('upload_max_filesize') }}B</p>
                    @error('file') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror

                    <div x-show="uploading" x-cloak class="mt-3">
                        <div class="flex items-center justify-between text-xs text-zinc-600 mb-1">
                            <span>Uploading...</span>
                            <span x-text="progress + '%'"></span>
                        </div>
                        <div class="w-full h-2 bg-zinc-200 dark:bg-zinc-700 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-600 rounded-full transition-all duration-300" :style="'width: ' + progress + '%'"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Release Notes (optional)</label>
                    <textarea wire:model="release_notes" rows="3" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="What's new in this version..."></textarea>
                </div>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg">Upload Release</button>
            </form>
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Version</th>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Platform</th>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Uploaded</th>
                    <th class="px-6 py-3 text-right font-medium text-zinc-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                @forelse($releases as $release)
                    <tr wire:key="release-{{ $release->id }}">
                        <td class="px-6 py-3 font-medium">v{{ $release->version }}</td>
                        <td class="px-6 py-3">
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $release->platform === 'android' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($release->platform) }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-zinc-500">{{ $release->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <a href="{{ $release->download_url }}" class="text-xs text-emerald-600 hover:underline">Download</a>
                            <button wire:click="delete({{ $release->id }})" wire:confirm="Delete v{{ $release->version }}?" class="text-xs text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-8 text-center text-zinc-500">No releases uploaded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
