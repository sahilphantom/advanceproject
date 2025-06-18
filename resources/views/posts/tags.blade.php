@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Posts with Tags</h1>

        @forelse ($posts as $post)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-3">{{ $post->body }}</p>

                @if ($post->tags->count())
                    <div class="flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <span class="inline-block bg-blue-100 dark:bg-blue-700 text-blue-800 dark:text-blue-100 text-xs px-3 py-1 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400">No tags assigned.</p>
                @endif

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-3">Posted: {{ $post->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="text-center text-gray-500 dark:text-gray-400">
                No posts available.
            </div>
        @endforelse
    </div>
@endsection
