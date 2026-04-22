<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sharing Something</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">

    {{-- Navbar --}}
    <header class="sticky top-0 z-10 bg-[#FDFDFC]/90 dark:bg-[#0a0a0a]/90 backdrop-blur border-b border-neutral-100 dark:border-neutral-800">
        <div class="max-w-3xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-semibold text-lg tracking-tight">SharingSomething</a>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('posts.create') }}"
                        class="px-4 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-full text-sm hover:opacity-80 transition">
                        Write
                    </a>
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-neutral-500 hover:text-neutral-800 dark:hover:text-white transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm text-neutral-500 hover:text-neutral-800 dark:hover:text-white transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-full text-sm hover:opacity-80 transition">
                            Sign up
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="max-w-3xl mx-auto px-6 pt-4">
            <div class="px-4 py-2 bg-green-100 text-green-800 rounded text-sm border border-green-200">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- Feed --}}
    <main class="max-w-3xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold mb-8 text-neutral-800 dark:text-neutral-100">Latest Posts</h1>

        <div class="divide-y divide-neutral-100 dark:divide-neutral-800">
            @foreach ($posts as $post)
                @php
                    $wordCount = str_word_count(strip_tags($post->content));
                    $readTime  = max(1, (int) ceil($wordCount / 200));
                    $initials  = collect(explode(' ', $post->user->name))->take(2)->map(fn($w) => strtoupper($w[0]))->implode('');
                @endphp

                <article class="py-6 flex flex-col gap-3">

                    {{-- Author row --}}
                    <div class="flex items-center gap-2 text-sm text-neutral-500">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-neutral-200 dark:bg-neutral-700 text-neutral-700 dark:text-neutral-200 text-xs font-semibold select-none">
                            {{ $initials }}
                        </span>
                        <span class="font-medium text-neutral-700 dark:text-neutral-300">{{ $post->user->name }}</span>
                        <span>·</span>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>

                    {{-- Title + Excerpt --}}
                    <a href="{{ route('posts.show', $post) }}" class="group block">
                        <h2 class="text-xl font-bold leading-snug text-neutral-900 dark:text-white group-hover:underline decoration-1 underline-offset-2 mb-1">
                            {{ $post->title }}
                        </h2>
                        <p class="text-neutral-500 dark:text-neutral-400 text-sm leading-relaxed line-clamp-2">
                            {{ Str::limit(strip_tags($post->content), 200) }}
                        </p>
                    </a>

                    {{-- Footer row --}}
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-neutral-400">{{ $readTime }} min read</span>
                        <a href="{{ route('posts.show', $post) }}"
                            class="text-xs text-blue-500 hover:text-blue-700 transition">
                            Read more →
                        </a>
                    </div>

                </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </main>

</body>

</html>
