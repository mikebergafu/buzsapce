<div>
    {{-- Stats cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800">
            <div class="text-sm text-zinc-500">Total Users</div>
            <div class="mt-1 text-3xl font-bold">{{ number_format($totalUsers) }}</div>
        </div>
        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800">
            <div class="text-sm text-zinc-500">Total Spaces</div>
            <div class="mt-1 text-3xl font-bold">{{ number_format($totalSpaces) }}</div>
        </div>
        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800">
            <div class="text-sm text-zinc-500">Available Spaces</div>
            <div class="mt-1 text-3xl font-bold text-emerald-600">{{ number_format($availableSpaces) }}</div>
        </div>
    </div>

    {{-- Recent users --}}
    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-zinc-200 dark:border-zinc-800">
        <div class="px-6 py-4 border-b border-zinc-200 dark:border-zinc-800">
            <h2 class="font-semibold">Recent Users</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Name</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Contact</th>
                        <th class="px-6 py-3 text-left font-medium text-zinc-500">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                    @foreach($recentUsers as $user)
                        <tr>
                            <td class="px-6 py-3">{{ $user->name }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $user->email ?? $user->phone }}</td>
                            <td class="px-6 py-3 text-zinc-500">{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
