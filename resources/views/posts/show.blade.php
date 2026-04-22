<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $post->title }} — SharingSomething</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center flex-col">

    {{-- Navbar --}}
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-8 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="font-semibold text-base dark:text-[#EDEDEC]">SharingSomething</a>
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
        <div class="w-full lg:max-w-4xl max-w-[335px] mb-4 px-4 py-2 bg-green-100 text-green-800 rounded text-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col w-full lg:max-w-4xl max-w-[335px]">

        {{-- Back navigation: Dashboard untuk pemilik, Home untuk guest --}}
        @auth
            @if (auth()->id() === $post->user_id)
                <a class="text-sm underline mb-6 hover:text-slate-500 w-fit" href="{{ route('dashboard') }}">
                    ← Back to Dashboard
                </a>
            @else
                <a class="text-sm underline mb-6 hover:text-slate-500 w-fit" href="{{ route('home') }}">
                    ← Back to Home
                </a>
            @endif
        @else
            <a class="text-sm underline mb-6 hover:text-slate-500 w-fit" href="{{ route('home') }}">
                ← Back to Home
            </a>
        @endauth

        {{-- Post Header --}}
        <h1 class="text-3xl font-bold mb-2 text-left">{{ $post->title }}</h1>
        <div class="flex items-center gap-3 text-sm text-neutral-500 mb-4">
            <span class="font-medium text-neutral-700 dark:text-neutral-300">{{ $post->user->name }}</span>
            <span>·</span>
            <span>{{ $post->created_at->format('M d, Y') }}</span>
        </div>

        {{-- Owner Actions --}}
        @auth
            @if (auth()->id() === $post->user_id)
                <div class="flex gap-2 mb-6">
                    <a href="{{ route('posts.edit', $post) }}"
                        class="px-4 py-1.5 text-sm border border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] rounded-sm transition">
                        ✏️ Edit Post
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}"
                        onsubmit="return confirm('Hapus post ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-1.5 text-sm text-red-600 border border-red-200 hover:border-red-400 rounded-sm transition">
                            🗑️ Delete Post
                        </button>
                    </form>
                </div>
            @endif
        @endauth

        {{-- Post Content --}}
        <article class="prose dark:prose-invert max-w-none leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </article>
    </div>

    <div class="h-14.5 hidden lg:block"></div>
</body>

</html>
