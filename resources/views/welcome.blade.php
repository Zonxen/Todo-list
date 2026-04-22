<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sharing Something</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center flex-col">
    <header class="w-full lg:max-w-7xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4">
                {{-- Logo / Brand --}}
                <span class="font-semibold text-base dark:text-[#EDEDEC]">SharingSomething</span>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('posts.create') }}"
                            class="inline-block px-4 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm hover:opacity-80 transition">
                            + New Post
                        </a>
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-4 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-4 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-4 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="w-full lg:max-w-7xl max-w-[335px] mb-4 px-4 py-2 bg-green-100 text-green-800 rounded text-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col w-full lg:max-w-7xl max-w-[335px]">
        <h1 class="text-3xl font-bold mb-6 text-left">Latest Posts</h1>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-[#1a1a1a] p-4 rounded shadow-sm border border-neutral-100 dark:border-neutral-800 flex flex-col gap-2">
                    <h2 class="text-xl font-semibold leading-snug">{{ $post->title }}</h2>
                    <p class="flex-1 text-sm text-neutral-600 dark:text-neutral-400">{{ Str::limit($post->content, 180) }}</p>
                    <div class="flex items-center justify-between mt-2 text-sm">
                        <span class="text-neutral-400">{{ $post->user->name }}</span>
                        <a class="text-blue-500 hover:underline" href="{{ route('posts.show', $post) }}">Read more →</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
