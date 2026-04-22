<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center flex-col">
    <header class="w-full lg:max-w-7xl max-w-[335px] text-sm mb-12 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="flex flex-col min-h-screen max-w-7xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-left">Sharing Something</h1>
            @auth
                <a href="{{ route('posts.create') }}"
                    class="inline-block px-5 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm leading-normal hover:opacity-80 transition">
                    + New Post
                </a>
            @endauth
        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-[#1a1a1a] p-4 rounded shadow-md mb-4 flex flex-col gap-2">
                    <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
                    <p class="flex-1">{{ Str::limit($post->content, 200) }}</p>

                    @auth
                        <p class="text-sm text-slate-500">- {{ $post->user->name }}</p>
                    @endauth

                    <div class="flex items-center justify-between mt-2">
                        <a class="text-blue-500 text-sm hover:underline" href="{{ route('posts.show', $post) }}">Read more →</a>

                        @auth
                            @if (auth()->id() === $post->user_id)
                                <div class="flex gap-2">
                                    <a href="{{ route('posts.edit', $post) }}"
                                        class="px-3 py-1 text-xs border border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] rounded-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                        onsubmit="return confirm('Hapus post ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-xs text-red-600 border border-red-200 hover:border-red-400 rounded-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
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
