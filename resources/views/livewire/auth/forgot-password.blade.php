<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <img src="/images/brand/icon.svg" alt="BuzSpace" class="h-12 w-12 mx-auto">
            <h1 class="mt-4 text-2xl font-bold text-zinc-900 dark:text-zinc-100">Forgot Password</h1>
            <p class="mt-1 text-sm text-zinc-500">We'll email you a reset link</p>
        </div>

        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800 shadow-sm">
            @if($sent)
                <div class="text-center py-4">
                    <svg class="w-12 h-12 mx-auto text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <p class="mt-4 text-sm text-zinc-600 dark:text-zinc-400">Reset link sent to <strong>{{ $email }}</strong></p>
                    <a href="{{ route('admin.login') }}" class="mt-4 inline-block text-sm text-emerald-600 hover:underline">← Back to login</a>
                </div>
            @else
                <form wire:submit="sendResetLink">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                        <input wire:model="email" id="email" type="email" autofocus class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="admin@buzspace.com">
                        @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors">
                        Send Reset Link
                    </button>
                </form>
                <div class="mt-4 text-center">
                    <a href="{{ route('admin.login') }}" class="text-sm text-zinc-500 hover:text-zinc-700">← Back to login</a>
                </div>
            @endif
        </div>
    </div>
</div>
