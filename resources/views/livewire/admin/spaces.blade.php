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
                            <td class="px-6 py-3 font-medium">{{ $space->name ?? '—' }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $space->user?->name ?? '—' }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $space->location }}</td>
                            <td class="px-6 py-3">GH₵{{ number_format($space->price) }}/{{ $space->pricing_type }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $space->is_available ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ $space->is_available ? 'Available' : 'Taken' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-right space-x-2">
                                <button wire:click="viewSpace({{ $space->id }})" class="text-xs text-blue-600 hover:underline">View</button>
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

    {{-- Detail slide-over --}}
    @if($viewing)
        <div class="fixed inset-0 z-50 flex justify-end" x-data x-on:keydown.escape.window="$wire.closeDetail()">
            <div class="absolute inset-0 bg-black/30" wire:click="closeDetail"></div>
            <div class="relative w-full max-w-lg bg-white dark:bg-zinc-900 shadow-xl overflow-y-auto">
                <div class="sticky top-0 bg-white dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800 px-6 py-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Space Details</h2>
                    <button wire:click="closeDetail" class="p-1 text-zinc-400 hover:text-zinc-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="p-6 space-y-6">
                    {{-- Images --}}
                    @if($viewing->images->count())
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($viewing->images as $image)
                                <img src="{{ $image->url }}" alt="Space image" class="w-full h-32 object-cover rounded-lg">
                            @endforeach
                        </div>
                    @elseif($viewing->image_url)
                        <img src="{{ $viewing->image_url }}" alt="Space" class="w-full h-48 object-cover rounded-lg">
                    @endif

                    {{-- Basic info --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs text-zinc-500">Name</div>
                            <div class="font-medium">{{ $viewing->name ?? '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Structure Type</div>
                            <div class="font-medium">{{ $viewing->structure_type ?? '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Location</div>
                            <div class="font-medium">{{ $viewing->location ?? '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Status</div>
                            <div>
                                <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $viewing->is_available ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $viewing->is_available ? 'Available' : 'Taken' }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Dimensions</div>
                            <div class="font-medium">{{ $viewing->width && $viewing->length ? $viewing->width . ' × ' . $viewing->length . ' ' . ($viewing->dimension_unit ?? 'm') : '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Price</div>
                            <div class="font-medium">GH₵{{ number_format($viewing->price) }}/{{ $viewing->pricing_type }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Commission Rate</div>
                            <div class="font-medium">{{ $viewing->commission_rate ? $viewing->commission_rate . '%' : '—' }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500">Coordinates</div>
                            <div class="font-medium text-xs">{{ $viewing->latitude && $viewing->longitude ? $viewing->latitude . ', ' . $viewing->longitude : '—' }}</div>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($viewing->description)
                        <div>
                            <div class="text-xs text-zinc-500 mb-1">Description</div>
                            <p class="text-sm text-zinc-700 dark:text-zinc-300">{{ $viewing->description }}</p>
                        </div>
                    @endif

                    {{-- Suitable for --}}
                    @if($viewing->suitable_for)
                        <div>
                            <div class="text-xs text-zinc-500 mb-1">Suitable For</div>
                            <div class="flex flex-wrap gap-1">
                                @foreach($viewing->suitable_for as $item)
                                    <span class="px-2 py-0.5 text-xs bg-zinc-100 dark:bg-zinc-800 rounded-full">{{ $item }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Pricing options --}}
                    @if($viewing->pricingOptions->count())
                        <div>
                            <div class="text-xs text-zinc-500 mb-2">Pricing Options</div>
                            <div class="space-y-1">
                                @foreach($viewing->pricingOptions as $option)
                                    <div class="flex justify-between text-sm bg-zinc-50 dark:bg-zinc-800 px-3 py-2 rounded-lg">
                                        <span class="capitalize">{{ $option->type }}</span>
                                        <span class="font-medium">GH₵{{ number_format($option->amount) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Owner --}}
                    <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4">
                        <div class="text-xs text-zinc-500 mb-2">Owner</div>
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-sm font-semibold text-emerald-700 dark:text-emerald-400">
                                {{ strtoupper(substr($viewing->user?->name ?? '?', 0, 1)) }}
                            </div>
                            <div>
                                <div class="text-sm font-medium">{{ $viewing->user?->name ?? '—' }}</div>
                                <div class="text-xs text-zinc-500">{{ $viewing->user?->email ?? $viewing->user?->phone ?? '—' }}</div>
                            </div>
                        </div>
                    </div>

                    {{-- Meta --}}
                    <div class="text-xs text-zinc-400 pt-2">
                        Created {{ $viewing->created_at->format('M d, Y \a\t H:i') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
