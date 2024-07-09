{{--<!-- resources/views/livewire/upload-transactions.blade.php -->--}}
{{--<div x-data="{ isDropping: false }" class="max-w-md mx-auto my-10 p-6 bg-white rounded-lg shadow-md">--}}
{{--    <form wire:submit.prevent="save" x-on:drop.prevent="isDropping = false" x-on:drop="handleDrop" x-on:dragover.prevent="isDropping = true" x-on:dragleave.prevent="isDropping = false">--}}
{{--        <div x-bind:class="{ 'bg-blue-100': isDropping }" class="p-4 border-2 border-dashed border-gray-300 rounded-lg text-center">--}}
{{--            <input type="file" wire:model="file" class="hidden" x-ref="fileInput" />--}}
{{--            <p x-show="!isDropping">Drag & drop your CSV file here or click to upload</p>--}}
{{--            <p x-show="isDropping" class="text-blue-700">Drop the file here...</p>--}}
{{--        </div>--}}
{{--        <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg">Upload</button>--}}
{{--    </form>--}}
{{--    @if (session()->has('message'))--}}
{{--        <div class="mt-4 text-green-600">{{ session('message') }}</div>--}}
{{--    @endif--}}

{{--    <script>--}}
{{--        function handleDrop(event) {--}}
{{--            let files = event.dataTransfer.files;--}}
{{--            if (files.length > 0) {--}}
{{--                document.querySelector('input[type=file]').files = files;--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--</div>--}}
<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">CSV File</label>
            <input type="file" wire:model="file" class="mt-1 block w-full">
            @error('file') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg">Upload</button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600">{{ session('message') }}</div>
    @endif
</div>
