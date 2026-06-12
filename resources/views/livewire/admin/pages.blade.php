<div>
    @if($editing)
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 p-6">
            <h2 class="text-lg font-semibold mb-4">Edit: {{ ucwords(str_replace('-', ' ', $editing)) }}</h2>
            <form wire:submit="save" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Title</label>
                    <input wire:model="title" type="text" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Content (HTML)</label>
                    <textarea wire:model="content" rows="20" class="w-full px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea>
                    @error('content') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors">Save</button>
                    <button type="button" wire:click="cancel" class="px-4 py-2 text-sm font-medium text-zinc-600 bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 rounded-lg transition-colors">Cancel</button>
                </div>
            </form>
        </div>
    @else
        <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Page</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Last Updated</th>
                        <th class="px-6 py-3 text-right font-medium text-zinc-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                    <tr>
                        <td class="px-6 py-3 font-medium">Privacy Policy</td>
                        <td class="px-6 py-3 text-zinc-500">{{ optional($pages->firstWhere('slug', 'privacy-policy'))->updated_at?->format('M d, Y H:i') ?? 'Not created' }}</td>
                        <td class="px-6 py-3 text-right">
                            <button wire:click="edit('privacy-policy')" class="text-xs text-emerald-600 hover:underline">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 font-medium">Terms of Use</td>
                        <td class="px-6 py-3 text-zinc-500">{{ optional($pages->firstWhere('slug', 'terms-of-use'))->updated_at?->format('M d, Y H:i') ?? 'Not created' }}</td>
                        <td class="px-6 py-3 text-right">
                            <button wire:click="edit('terms-of-use')" class="text-xs text-emerald-600 hover:underline">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
