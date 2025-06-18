@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Videos with Tags</h1>

        @forelse ($videos as $video)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $video->title }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-3">{{ $video->description }}</p>

                @if ($video->tags->count())
                    <div class="flex flex-wrap gap-2">
                        @foreach ($video->tags as $tag)
                            <span class="inline-block bg-purple-100 dark:bg-purple-700 text-purple-800 dark:text-purple-100 text-xs px-3 py-1 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400">No tags assigned.</p>
                @endif

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-3">Published: {{ $video->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <div class="text-center text-gray-500 dark:text-gray-400">
                No videos found.
            </div>
        @endforelse
    </div>
@endsection
