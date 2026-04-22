<x-layouts.app :title="__('Dashboard')">
    <div>
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-4xl">Hai {{ auth()->user()->name }}</h1>
            <a href="{{ route('posts.create') }}"
                class="inline-block px-5 py-1.5 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm leading-normal hover:opacity-80 transition">
                + New Post
            </a>
        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            @foreach ($posts as $post)
                <div class="p-4 rounded shadow-md mb-4 border border-neutral-200 dark:border-neutral-700 flex flex-col gap-2">
                    <h2 class="text-2xl font-semibold">{{ $post->title }}</h2>
                    <p class="flex-1">{{ Str::limit($post->content, 200) }}</p>
                    <p class="text-sm text-slate-500">- {{ $post->user->name }}</p>

                    <div class="flex items-center justify-between mt-2">
                        <a class="text-blue-500 text-sm hover:underline" href="{{ route('posts.show', $post) }}">Read more →</a>

                        @if (auth()->id() === $post->user_id)
                            <div class="flex gap-2">
                                <a href="{{ route('posts.edit', $post) }}"
                                    class="px-3 py-1 text-xs border border-neutral-300 dark:border-neutral-600 hover:border-neutral-500 rounded-sm">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
