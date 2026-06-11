<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <img src="/images/brand/icon.svg" alt="BuzSpace" class="h-12 w-12 mx-auto">
            <h1 class="mt-4 text-2xl font-bold text-zinc-900 dark:text-zinc-100">Admin Login</h1>
            <p class="mt-1 text-sm text-zinc-500">Sign in to manage BuzSpace</p>
        </div>

        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800 shadow-sm">
            @if(session('status'))
                <div class="mb-4 p-3 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-sm text-emerald-700 dark:text-emerald-400">{{ session('status') }}</div>
            @endif
            <form wire:submit="authenticate">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                    <input wire:model="email" id="email" type="email" autofocus class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="admin@buzspace.com">
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Password</label>
                        <a href="{{ route('admin.password.request') }}" class="text-xs text-emerald-600 hover:underline">Forgot password?</a>
                    </div>
                    <input wire:model="password" id="password" type="password" class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center mb-4">
                    <input wire:model="remember" id="remember" type="checkbox" class="w-4 h-4 rounded border-zinc-300 text-emerald-600 focus:ring-emerald-500">
                    <label for="remember" class="ml-2 text-sm text-zinc-600 dark:text-zinc-400">Remember me</label>
                </div>

                <button type="submit" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</div>
