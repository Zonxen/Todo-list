<x-layouts.app :title="__('Dashboard')">
    <div>
        <h1 class="text-4xl">Hai {{ auth()->user()->name }}</h1>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
            @foreach ($posts as $post)
                <div class="p-4 rounded shadow-md mb-4">
                    <h1 class="text-2xl font-semibold mb-2">{{ $post->title }}</h1>
                    <p>{{ Str::limit($post->content, 200) }}</p> @auth <p>- {{ $post->user->name }}</p> @endauth <a
                        class="text-blue-500" href="{{ route('posts.show', $post) }}">Read more</a>
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
