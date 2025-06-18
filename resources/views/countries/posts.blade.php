@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Posts from {{ $country->name }}</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($country->posts as $post)
            <div class="bg-white rounded-2xl shadow hover:shadow-lg transition-all duration-300 p-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->body, 120) }}</p>
                <div class="text-xs text-gray-500">
                    Posted by <span class="font-medium text-gray-700">{{ $post->user->name }}</span> 
                    on {{ $post->created_at->format('M d, Y') }}
                </div>
            </div>
        @empty
            <div class="col-span-full bg-yellow-100 text-yellow-800 p-4 rounded">
                No posts available for this country.
            </div>
        @endforelse
    </div>
@endsection
