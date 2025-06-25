@extends('layouts.app')

@section('title', 'User Search')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <h1 class="text-2xl font-bold text-center mb-6">Livewire Realtime User Search</h1>
        
        @livewire('user-search')
    </div>
@endsection
