<div>
    <div class="flex items-center justify-between mb-6">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search users..." class="w-full sm:w-80 px-4 py-2 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <a href="{{ route('admin.admins') }}" class="ml-4 px-4 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors shrink-0">
            Manage Admins
        </a>
    </div>

    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Name</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Contact</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Role</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Joined</th>
                        <th class="px-6 py-3 text-right font-medium text-zinc-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                    @foreach($users as $user)
                        <tr wire:key="user-{{ $user->id }}">
                            <td class="px-6 py-3 font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $user->email ?? ($user->country_code . $user->phone) }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $user->is_admin ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-400' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-zinc-500">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-3 text-right space-x-2">
                                <button wire:click="toggleAdmin({{ $user->id }})" wire:confirm="Toggle admin status for {{ $user->name }}?" class="text-xs text-emerald-600 hover:underline">
                                    {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                </button>
                                @unless($user->is_admin)
                                    <button wire:click="deleteUser({{ $user->id }})" wire:confirm="Delete {{ $user->name }}? This cannot be undone." class="text-xs text-red-600 hover:underline">
                                        Delete
                                    </button>
                                @endunless
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
