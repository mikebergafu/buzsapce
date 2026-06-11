<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <img src="/images/brand/icon.svg" alt="BuzSpace" class="h-12 w-12 mx-auto">
            <h1 class="mt-4 text-2xl font-bold text-zinc-900 dark:text-zinc-100">Reset Password</h1>
            <p class="mt-1 text-sm text-zinc-500">Enter your new password</p>
        </div>

        <div class="bg-white dark:bg-zinc-900 rounded-xl p-6 border border-zinc-200 dark:border-zinc-800 shadow-sm">
            <form wire:submit="resetPassword">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Email</label>
                    <input wire:model="email" id="email" type="email" class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">New Password</label>
                    <input wire:model="password" id="password" type="password" class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Confirm Password</label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" class="w-full px-4 py-2.5 rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>

                <button type="submit" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>
