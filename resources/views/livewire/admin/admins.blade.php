<div>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold">Admin Users</h2>
        <button wire:click="$toggle('showForm')" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors">
            {{ $showForm ? 'Cancel' : 'Add Admin' }}
        </button>
    </div>

    @if($showForm)
        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800 mb-6">
            <form wire:submit="create" class="grid sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Name</label>
                    <input wire:model="name" type="text" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Full name">
                    @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                    <input wire:model="email" type="email" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="email@example.com">
                    @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Password</label>
                    <div class="flex gap-2">
                        <input wire:model="password" type="text" class="w-full px-3 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Min 8 characters">
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg shrink-0">Save</button>
                    </div>
                    @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </form>
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Name</th>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Email</th>
                    <th class="px-6 py-3 text-left font-medium text-zinc-500">Created</th>
                    <th class="px-6 py-3 text-right font-medium text-zinc-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                @foreach($admins as $admin)
                    <tr wire:key="admin-{{ $admin->id }}">
                        <td class="px-6 py-3 font-medium">{{ $admin->name }}</td>
                        <td class="px-6 py-3 text-zinc-500">{{ $admin->email }}</td>
                        <td class="px-6 py-3 text-zinc-500">{{ $admin->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-3 text-right">
                            @if($admin->id !== Auth::guard('admin')->id())
                                <button wire:click="delete({{ $admin->id }})" wire:confirm="Remove {{ $admin->name }} as admin?" class="text-xs text-red-600 hover:underline">Remove</button>
                            @else
                                <span class="text-xs text-zinc-400">You</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
