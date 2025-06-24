

    <div
        class="p-6 rounded shadow-md max-w-md mx-auto mt-10 transition-all"
        style="background-color: {{ str_contains(strtolower($name), 'admin') ? '#ffe5e9' : '#ffffff' }};"
    >
        <h2 class="text-xl font-bold mb-4">Livewire Hello World</h2>

        <input
            type="text"
            wire:model="name"
            placeholder="Enter your name"
            class="border p-2 rounded w-full mb-2"
        >

        {{-- Character Count --}}
        <p class="text-sm text-gray-500 mb-2">Character count: {{ strlen($name) }}</p>

      {{-- Validation --}}
@if(strlen($name) > 0 && !$isValidName)
    <p class="text-red-600 text-sm mb-2">Name must be at least 3 characters long.</p>
@endif

{{-- Submit Button --}}
<button
    wire:click="submit"
    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
>
    Submit
</button>

{{-- Greeting --}}
@if($submitted && $isValidName)
    <p class="mt-4 text-lg font-semibold">Hello, {{ $name }}!</p>
@endif

    </div>

    @livewireScripts

    <script>
        Livewire.on('NameSubmitted', () => {
            console.log('Event: NameSubmitted');

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: 'Name submitted successfully!',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>

