<div>
    <div class="mb-6">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search spaces..." class="w-full sm:w-80 px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
    </div>

    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Name</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Owner</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Location</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Price</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Status</th>
                        <th class="px-6 py-3 text-right font-medium text-zinc-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                    @foreach($spaces as $space)
                        <tr wire:key="space-{{ $space->id }}">
                            <td class="px-6 py-3 font-medium">{{ $space->name }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $space->user?->name ?? '—' }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $space->location }}</td>
                            <td class="px-6 py-3">GH₵{{ number_format($space->price) }}/{{ $space->pricing_type }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $space->is_available ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ $space->is_available ? 'Available' : 'Taken' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-right space-x-2">
                                <button wire:click="toggleAvailability({{ $space->id }})" class="text-xs text-emerald-600 hover:underline">
                                    {{ $space->is_available ? 'Mark Taken' : 'Mark Available' }}
                                </button>
                                <button wire:click="deleteSpace({{ $space->id }})" wire:confirm="Delete '{{ $space->name }}'? This cannot be undone." class="text-xs text-red-600 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $spaces->links() }}
    </div>
</div>
