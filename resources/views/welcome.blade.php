<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuzSpace - Find & Share Shop Spaces</title>
    <meta name="description" content="BuzSpace connects shop owners with available shared retail spaces. List your space or find the perfect spot to sell.">
    <meta property="og:title" content="BuzSpace - Find & Share Shop Spaces">
    <meta property="og:description" content="Connect with shop owners who have space to share. Start selling without the overhead.">
    <meta property="og:type" content="website">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased overflow-x-hidden">

    {{-- Navigation --}}
    <nav class="fixed top-0 inset-x-0 z-50 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md border-b border-zinc-100 dark:border-zinc-800/50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="flex items-center gap-2">
                    <img src="/images/brand/icon.svg" alt="BuzSpace" class="h-8 w-8">
                    <span class="text-xl font-bold text-emerald-600 dark:text-emerald-400">BuzSpace</span>
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#how-it-works" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">How It Works</a>
                    <a href="#features" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Features</a>
                    <a href="#testimonials" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Testimonials</a>
                    <a href="#faq" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">FAQ</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#download" class="inline-flex items-center px-5 py-2 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg transition-colors shadow-sm shadow-emerald-600/20">
                        Get the App
                    </a>
                    {{-- Mobile menu button --}}
                    <button class="md:hidden p-2 rounded-lg text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
            {{-- Mobile menu --}}
            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-zinc-100 dark:border-zinc-800 mt-2 pt-4">
                <div class="flex flex-col gap-3">
                    <a href="#how-it-works" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 py-1">How It Works</a>
                    <a href="#features" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 py-1">Features</a>
                    <a href="#testimonials" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 py-1">Testimonials</a>
                    <a href="#faq" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-emerald-600 py-1">FAQ</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative pt-32 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
        {{-- Background gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/80 via-white to-teal-50/50 dark:from-emerald-950/20 dark:via-zinc-950 dark:to-teal-950/10"></div>
        <div class="absolute top-20 right-0 w-96 h-96 bg-emerald-200/30 dark:bg-emerald-800/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-teal-200/20 dark:bg-teal-800/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="max-w-xl">
                    <div data-animate="fade-up" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-medium mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Now available in 50+ cities across Ghana
                    </div>
                    <h1 data-animate="fade-up" class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight leading-[1.1]">
                        Share a shop space.
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">Grow your business.</span>
                    </h1>
                    <p data-animate="fade-up" class="mt-6 text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
                        BuzSpace connects entrepreneurs who need retail space with shop owners who have space to share. List your available space or find the perfect spot to sell — all from your phone.
                    </p>
                    <div data-animate="fade-up" class="mt-10 flex flex-col sm:flex-row items-start gap-4">
                        <a href="#download" class="group inline-flex items-center gap-2 px-8 py-3.5 text-base font-medium text-white bg-emerald-600 hover:bg-emerald-700 rounded-xl shadow-lg shadow-emerald-600/25 transition-all hover:shadow-emerald-600/40 hover:-translate-y-0.5">
                            Download Now
                            <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="#how-it-works" class="inline-flex items-center gap-2 px-8 py-3.5 text-base font-medium text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-700 rounded-xl transition-colors border border-zinc-200 dark:border-zinc-700">
                            <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                            See How It Works
                        </a>
                    </div>

                    {{-- Trust badges --}}
                    <div class="mt-10 flex items-center gap-6 text-sm text-zinc-500 dark:text-zinc-400">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Free to use
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            No contracts
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Verified spaces
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex justify-center">
                    <img src="/images/brand/hero-illustration.svg" alt="BuzSpace - Shared shop spaces marketplace" class="w-full max-w-lg drop-shadow-xl animate-float">
                </div>
            </div>

            {{-- Stats --}}
            <div class="mt-24 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto" data-stagger>
                <div data-animate="fade-up" class="text-center p-6 rounded-2xl bg-white dark:bg-zinc-800/50 border border-zinc-100 dark:border-zinc-800 shadow-sm">
                    <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent" data-count="500" data-suffix="+">0</div>
                    <div class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Spaces Listed</div>
                </div>
                <div data-animate="fade-up" class="text-center p-6 rounded-2xl bg-white dark:bg-zinc-800/50 border border-zinc-100 dark:border-zinc-800 shadow-sm">
                    <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent" data-count="1200" data-suffix="+">0</div>
                    <div class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Active Sellers</div>
                </div>
                <div data-animate="fade-up" class="text-center p-6 rounded-2xl bg-white dark:bg-zinc-800/50 border border-zinc-100 dark:border-zinc-800 shadow-sm">
                    <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent" data-count="50" data-suffix="+">0</div>
                    <div class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Cities in Ghana</div>
                </div>
                <div data-animate="fade-up" class="text-center p-6 rounded-2xl bg-white dark:bg-zinc-800/50 border border-zinc-100 dark:border-zinc-800 shadow-sm">
                    <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent" data-count="98" data-suffix="%">0</div>
                    <div class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section id="how-it-works" class="py-24 px-4 sm:px-6 lg:px-8 bg-zinc-50 dark:bg-zinc-900/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">Simple Process</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold">How It Works</h2>
                <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">Get started in three simple steps — whether you're listing a space or looking for one</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto relative" data-stagger>
                {{-- Connector line --}}
                <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-gradient-to-r from-emerald-200 via-emerald-300 to-emerald-200 dark:from-emerald-800 dark:via-emerald-700 dark:to-emerald-800"></div>

                <div data-animate="fade-up" class="relative bg-white dark:bg-zinc-800 rounded-2xl p-8 text-center shadow-sm border border-zinc-100 dark:border-zinc-700 hover:shadow-md hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-emerald-600 text-white text-xl font-bold shadow-lg shadow-emerald-600/30">1</div>
                    <h3 class="mt-6 text-lg font-semibold">Sign Up</h3>
                    <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">Create your account with your phone number or email. Quick OTP verification, no passwords needed.</p>
                </div>
                <div data-animate="fade-up" class="relative bg-white dark:bg-zinc-800 rounded-2xl p-8 text-center shadow-sm border border-zinc-100 dark:border-zinc-700 hover:shadow-md hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-emerald-600 text-white text-xl font-bold shadow-lg shadow-emerald-600/30">2</div>
                    <h3 class="mt-6 text-lg font-semibold">List or Browse</h3>
                    <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">Have space? Post it with photos and pricing. Need space? Browse available listings near you with filters.</p>
                </div>
                <div data-animate="fade-up" class="relative bg-white dark:bg-zinc-800 rounded-2xl p-8 text-center shadow-sm border border-zinc-100 dark:border-zinc-700 hover:shadow-md hover:-translate-y-1 transition-all">
                    <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-emerald-600 text-white text-xl font-bold shadow-lg shadow-emerald-600/30">3</div>
                    <h3 class="mt-6 text-lg font-semibold">Connect & Sell</h3>
                    <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400">Agree on terms, move in, and start selling. Build your business without the overhead of a full lease.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">Platform Features</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold">Why BuzSpace?</h2>
                <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">Built for entrepreneurs who want flexibility without the long-term commitments</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto" data-stagger>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">Location-Based Search</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Find available spaces near you with real-time map search, distance filters, and neighborhood insights.</p>
                </div>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">Verified Listings</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">All spaces are verified with real photos. Know exactly what you're getting before you commit.</p>
                </div>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">In-App Messaging</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Chat directly with space owners to negotiate terms, ask questions, and arrange visits.</p>
                </div>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">Secure Agreements</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Digital agreements protect both parties. Clear terms, transparent pricing, peace of mind.</p>
                </div>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">Flexible Pricing</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Daily, weekly, or monthly rates. Pay only for the time you need the space — no hidden fees.</p>
                </div>
                <div data-animate="fade-up" class="group p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-800 hover:shadow-lg hover:shadow-emerald-50 dark:hover:shadow-emerald-950/20 transition-all">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-emerald-600 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">Ratings & Reviews</h3>
                    <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">See honest reviews from other sellers. Build your reputation as a trusted host or reliable tenant.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- For Space Owners / For Sellers --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-zinc-50 dark:bg-zinc-900/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">For Everyone</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold">Built for Both Sides</h2>
                <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400">Whether you own space or need space, BuzSpace works for you</p>
            </div>
            <div class="grid lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                {{-- For Space Owners --}}
                <div data-animate="fade-left" class="bg-white dark:bg-zinc-800 rounded-2xl p-8 sm:p-10 border border-zinc-100 dark:border-zinc-700 hover:shadow-xl transition-shadow">
                    <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-semibold uppercase tracking-wider">
                        For Space Owners
                    </div>
                    <h3 class="mt-6 text-2xl font-bold">Earn from your empty space</h3>
                    <p class="mt-4 text-zinc-600 dark:text-zinc-400 leading-relaxed">Have unused shop space? Turn it into income. List your space in minutes and let BuzSpace connect you with verified sellers.</p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Set your own pricing and availability
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Screen and approve sellers before they move in
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Manage bookings directly from your phone
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Receive payments securely and directly
                        </li>
                    </ul>
                </div>
                {{-- For Sellers --}}
                <div data-animate="fade-right" class="bg-white dark:bg-zinc-800 rounded-2xl p-8 sm:p-10 border border-zinc-100 dark:border-zinc-700 hover:shadow-xl transition-shadow">
                    <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 text-xs font-semibold uppercase tracking-wider">
                        For Sellers
                    </div>
                    <h3 class="mt-6 text-2xl font-bold">Start selling without the overhead</h3>
                    <p class="mt-4 text-zinc-600 dark:text-zinc-400 leading-relaxed">No long-term leases. No huge upfront costs. Find a shared space, move in, and start selling to real customers.</p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Browse spaces by location, size, and budget
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Short-term and flexible commitments
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            See real photos and reviews before booking
                        </li>
                        <li class="flex items-start gap-3 text-sm text-zinc-600 dark:text-zinc-400">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Test new markets with minimal risk
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section id="testimonials" class="py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">Testimonials</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold">What Our Users Say</h2>
                <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400">Real stories from real entrepreneurs</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto" data-stagger>
                <div data-animate="fade-up" class="bg-white dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-700 shadow-sm">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed italic">"I had an empty counter at my shop for months. Within a week of listing on BuzSpace, a phone accessories seller moved in. Now I earn extra GH₵200/week doing nothing."</p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-sm font-semibold text-emerald-700 dark:text-emerald-400">AA</div>
                        <div>
                            <div class="text-sm font-medium">Ama Asante</div>
                            <div class="text-xs text-zinc-500">Shop Owner, Accra</div>
                        </div>
                    </div>
                </div>
                <div data-animate="fade-up" class="bg-white dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-700 shadow-sm">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed italic">"As a young entrepreneur, I couldn't afford a full shop lease. BuzSpace helped me find a shared space in Osu for just GH₵50/day. My perfume business has grown 3x since."</p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center text-sm font-semibold text-amber-700 dark:text-amber-400">KM</div>
                        <div>
                            <div class="text-sm font-medium">Kwame Mensah</div>
                            <div class="text-xs text-zinc-500">Seller, Osu</div>
                        </div>
                    </div>
                </div>
                <div data-animate="fade-up" class="bg-white dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-700 shadow-sm">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed italic">"I use BuzSpace to find pop-up spaces for my clothing brand in different markets every weekend. The flexibility is unmatched — I've tested 5 locations in 2 months."</p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-sm font-semibold text-teal-700 dark:text-teal-400">FA</div>
                        <div>
                            <div class="text-sm font-medium">Fatima Abubakari</div>
                            <div class="text-xs text-zinc-500">Fashion Seller, Kumasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="py-24 px-4 sm:px-6 lg:px-8 bg-zinc-50 dark:bg-zinc-900/50">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">FAQ</p>
                <h2 class="mt-3 text-3xl sm:text-4xl font-bold">Frequently Asked Questions</h2>
            </div>
            <div class="space-y-4">
                <details class="group bg-white dark:bg-zinc-800 rounded-xl border border-zinc-100 dark:border-zinc-700 overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer text-left font-medium hover:bg-zinc-50 dark:hover:bg-zinc-750 transition-colors">
                        Is BuzSpace free to use?
                        <svg class="w-5 h-5 text-zinc-400 shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="px-6 pb-6 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Yes! BuzSpace is completely free to download and use. We charge a small service fee only when a booking is confirmed, so you never pay unless you're actually getting value.</div>
                </details>
                <details class="group bg-white dark:bg-zinc-800 rounded-xl border border-zinc-100 dark:border-zinc-700 overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer text-left font-medium hover:bg-zinc-50 dark:hover:bg-zinc-750 transition-colors">
                        How do I list my shop space?
                        <svg class="w-5 h-5 text-zinc-400 shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="px-6 pb-6 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Simply sign up, tap "List a Space," upload photos of your available area, set your pricing (daily/weekly/monthly), and publish. Your listing goes live immediately and sellers in your area can find it.</div>
                </details>
                <details class="group bg-white dark:bg-zinc-800 rounded-xl border border-zinc-100 dark:border-zinc-700 overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer text-left font-medium hover:bg-zinc-50 dark:hover:bg-zinc-750 transition-colors">
                        What if I'm not satisfied with a seller?
                        <svg class="w-5 h-5 text-zinc-400 shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="px-6 pb-6 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">You maintain full control. You can review and approve sellers before they move in, set clear terms in the digital agreement, and report any issues through the app. Our support team is always available to help resolve disputes.</div>
                </details>
                <details class="group bg-white dark:bg-zinc-800 rounded-xl border border-zinc-100 dark:border-zinc-700 overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer text-left font-medium hover:bg-zinc-50 dark:hover:bg-zinc-750 transition-colors">
                        Which cities is BuzSpace available in?
                        <svg class="w-5 h-5 text-zinc-400 shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="px-6 pb-6 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">BuzSpace is currently available in 50+ cities across Ghana, including Accra, Kumasi, Tamale, Takoradi, Cape Coast, and more. We're expanding to new regions every month.</div>
                </details>
                <details class="group bg-white dark:bg-zinc-800 rounded-xl border border-zinc-100 dark:border-zinc-700 overflow-hidden">
                    <summary class="flex items-center justify-between p-6 cursor-pointer text-left font-medium hover:bg-zinc-50 dark:hover:bg-zinc-750 transition-colors">
                        How do payments work?
                        <svg class="w-5 h-5 text-zinc-400 shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <div class="px-6 pb-6 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">Payments are handled securely through the app via Mobile Money (MTN, Vodafone Cash, AirtelTigo). Space owners receive payments directly to their mobile wallet once a booking is confirmed.</div>
                </details>
            </div>
        </div>
    </section>

    {{-- Download CTA --}}
    <section id="download" class="py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-teal-700"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cpath d=&quot;M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.373zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zM22.344 0L13.858 8.485 15.272 9.9l9.9-9.9h-2.828zM27.998 0l-9.9 9.9 1.415 1.413L29.428 1.4 27.998 0zM33.656 0l-9.9 9.9 1.415 1.414L35.086 1.4 33.656 0zM39.313 0l-9.9 9.9 1.415 1.414L40.742 1.4 39.314 0z&quot; fill=&quot;%23fff&quot; fill-rule=&quot;evenodd&quot;/%3E%3C/svg%3E')"></div>

        <div class="relative max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="hidden lg:flex justify-center">
                    <img data-animate="fade-left" src="/images/brand/phone-mockup.svg" alt="BuzSpace mobile app" class="h-[440px] drop-shadow-2xl">
                </div>
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl sm:text-4xl font-bold text-white">Ready to find your space?</h2>
                    <p class="mt-4 text-lg text-emerald-100">Download BuzSpace and join thousands of entrepreneurs already growing their businesses.</p>
                    <div class="mt-10 flex flex-col sm:flex-row items-center lg:items-start justify-center lg:justify-start gap-4">
                        {{-- App Store --}}
                        <a href="#" class="inline-flex items-center gap-3 px-6 py-3.5 bg-white text-zinc-900 rounded-xl hover:bg-zinc-100 transition-colors shadow-lg">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs opacity-60">Download on the</div>
                                <div class="text-sm font-semibold">App Store</div>
                            </div>
                        </a>
                        {{-- Google Play --}}
                        <a href="#" class="inline-flex items-center gap-3 px-6 py-3.5 bg-white text-zinc-900 rounded-xl hover:bg-zinc-100 transition-colors shadow-lg">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3.18 23.04c-.24-.14-.43-.33-.57-.57-.14-.24-.22-.5-.24-.78V2.31c.02-.28.1-.54.24-.78.14-.24.33-.43.57-.57l10.9 11.04-10.9 11.04zm14.23-7.72L5.67 22.3l9.52-9.64 2.22 2.66zm1.13-1.42l-2.83-3.4L5.67 1.7l11.74 6.98 1.13 5.22zm1.78-1.9c.45.26.68.66.68 1 0 .34-.23.74-.68 1l-2.15 1.27-2.47-2.97 2.47-2.54 2.15 1.24z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs opacity-60">Get it on</div>
                                <div class="text-sm font-semibold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-16 px-4 sm:px-6 lg:px-8 bg-zinc-900 dark:bg-zinc-950 text-zinc-400">
        <div class="max-w-7xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <a href="/" class="flex items-center gap-2 mb-4">
                        <img src="/images/brand/icon.svg" alt="BuzSpace" class="h-8 w-8">
                        <span class="text-xl font-bold text-white">BuzSpace</span>
                    </a>
                    <p class="text-sm leading-relaxed">Connecting entrepreneurs with shared retail spaces across Ghana.</p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#how-it-works" class="hover:text-white transition-colors">How It Works</a></li>
                        <li><a href="#download" class="hover:text-white transition-colors">Download</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4">Support</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#faq" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-zinc-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm">
                    &copy; {{ date('Y') }} BuzSpace. All rights reserved.
                </div>
                <div class="flex items-center gap-6 text-sm">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
