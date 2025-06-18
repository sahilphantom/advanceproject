@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">All Comments</h1>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <table class="w-full table-auto border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                        <th class="px-4 py-2 border-b dark:border-gray-600">#</th>
                        <th class="px-4 py-2 border-b dark:border-gray-600">User</th>
                        <th class="px-4 py-2 border-b dark:border-gray-600">Comment</th>
                        <th class="px-4 py-2 border-b dark:border-gray-600">Commented On</th>
                        <th class="px-4 py-2 border-b dark:border-gray-600">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ $comment->id }}</td>
                            <td class="px-4 py-2">{{ $comment->user->name }}</td>
                            <td class="px-4 py-2">{{ $comment->body }}</td>
                            <td class="px-4 py-2">
                                @if ($comment->commentable)
                                    {{ class_basename($comment->commentable_type) }} #{{ $comment->commentable->id }}
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500 dark:text-gray-400">
                                No comments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
