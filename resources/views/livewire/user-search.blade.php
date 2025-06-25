<div class="max-w-xl mx-auto p-4 border rounded shadow bg-white">
    <label class="font-bold text-lg">Search Users</label>
    <input 
        type="text" 
        wire:model.debounce.500ms="search" 
        placeholder="Type a name or email..." 
        class="mt-2 w-full border px-3 py-2 rounded"
    >

    <!-- Loading Indicator -->
    <div wire:loading class="mt-2 text-sm text-blue-500">
        Loading...
    </div>

    <!-- Results -->
    <ul class="mt-4 space-y-2">
        @forelse($users as $user)
            <li class="border p-2 rounded bg-gray-50">
                <strong>{{ $user->name }}</strong> <br>
                <span class="text-sm text-gray-600">{{ $user->email }}</span>
            </li>
        @empty
            @if(strlen($search) > 1)
                <li class="text-gray-500">No users found.</li>
            @endif
        @endforelse
    </ul>
</div>
