<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Post — SharingSomething</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Quill Rich Text Editor -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor {
            min-height: 60vh;
            font-size: 1.125rem;
            font-family: Georgia, serif;
            line-height: 1.8;
        }
        .ql-toolbar.ql-snow {
            border-radius: 0.375rem 0.375rem 0 0;
            border-color: #e5e7eb;
        }
        .ql-container.ql-snow {
            border-radius: 0 0 0.375rem 0.375rem;
            border-color: #e5e7eb;
        }
    </style>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center flex-col">

    {{-- Navbar --}}
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-8 not-has-[nav]:hidden">
        <nav class="flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="font-semibold text-base dark:text-[#EDEDEC]">SharingSomething</a>
            <a href="{{ route('dashboard') }}"
                class="inline-block px-4 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm">
                Dashboard
            </a>
        </nav>
    </header>

    <div class="flex flex-col w-full lg:max-w-4xl max-w-[335px]">

        <a class="text-sm underline mb-6 hover:text-slate-500 w-fit" href="{{ route('dashboard') }}">
            ← Back to Dashboard
        </a>

        <h1 class="text-2xl font-bold mb-6">New Post</h1>

        <form class="gap-6 flex flex-col" method="POST" action="{{ route('posts.store') }}" id="post-form">
            @csrf

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="px-4 py-2 bg-red-50 text-red-700 rounded text-sm border border-red-200">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Title --}}
            <div>
                <input
                    class="lg:text-4xl md:text-2xl text-2xl font-medium font-serif w-full bg-transparent outline-none border-b border-neutral-200 dark:border-neutral-700 pb-2 placeholder-neutral-300 dark:placeholder-neutral-600"
                    type="text" name="title" value="{{ old('title') }}"
                    placeholder="Title" required>
            </div>

            {{-- Rich Text Editor --}}
            <div>
                <div id="quill-editor"></div>
                <input type="hidden" name="content" id="content-input">
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 mt-2">
                <button type="submit"
                    class="px-6 py-2 bg-[#1b1b18] text-white dark:bg-white dark:text-[#1b1b18] rounded-sm text-sm hover:opacity-80 transition">
                    Publish
                </button>
                <a href="{{ route('dashboard') }}"
                    class="px-6 py-2 text-sm border border-neutral-300 dark:border-neutral-600 rounded-sm hover:border-neutral-500 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="h-14.5 hidden lg:block"></div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Tell your story...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Pre-fill old content if validation failed
        @if (old('content'))
            quill.root.innerHTML = {!! json_encode(old('content')) !!};
        @endif

        // On submit, copy Quill HTML to hidden input
        document.getElementById('post-form').addEventListener('submit', function () {
            document.getElementById('content-input').value = quill.root.innerHTML;
        });
    </script>
</body>

</html>
