<x-layouts.app :title="__('My Posts')">
    <div class="flex flex-col gap-6">

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="px-4 py-2 bg-green-100 text-green-800 rounded text-sm border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">My Posts</h1>
                <p class="text-sm text-neutral-500 mt-0.5">Hai, {{ auth()->user()->name }} 👋</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('home') }}"
                    class="inline-block px-4 py-1.5 text-sm border border-neutral-300 dark:border-neutral-600 rounded-sm hover:border-neutral-500 transition">
                    ← Home
                </a>
                <a href="{{ route('posts.create') }}"
                    class="inline-block px-4 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm hover:opacity-80 transition">
                    + New Post
                </a>
            </div>
        </div>

        {{-- Post Grid --}}
        @if ($posts->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 text-center text-neutral-400 border border-dashed border-neutral-300 dark:border-neutral-700 rounded-xl">
                <p class="text-lg font-medium mb-2">Belum ada post</p>
                <p class="text-sm mb-4">Mulai tulis sesuatu dan bagikan ke dunia!</p>
                <a href="{{ route('posts.create') }}"
                    class="px-5 py-2 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm hover:opacity-80 transition">
                    + Tulis Post Pertamamu
                </a>
            </div>
        @else
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                @foreach ($posts as $post)
                    <div class="p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 flex flex-col gap-2">
                        <h2 class="text-lg font-semibold leading-snug">{{ $post->title }}</h2>
                        <p class="flex-1 text-sm text-neutral-500">{{ Str::limit($post->content, 160) }}</p>
                        <p class="text-xs text-neutral-400">{{ $post->created_at->format('M d, Y') }}</p>

                        <div class="flex items-center justify-between mt-2">
                            <a class="text-blue-500 text-sm hover:underline" href="{{ route('posts.show', $post) }}">Read more →</a>
                            <div class="flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}"
                                    class="px-3 py-1 text-xs border border-neutral-300 dark:border-neutral-600 hover:border-neutral-500 rounded-sm transition">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                    onsubmit="return confirm('Hapus post ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-xs text-red-600 border border-red-200 hover:border-red-400 rounded-sm transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-layouts.app>
