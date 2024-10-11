<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <form wire:submit="createPoll">
        <h2 class="text-2xl font-bold mb-6 text-center">Create a New Poll</h2>

        <div class="mb-6">
            <label for="title" class="block mb-2 font-semibold text-gray-700">Poll Title</label>
            <input type="text" id="title" wire:model.live="title"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <button type="button"
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300"
                wire:click.prevent="addOption">
                Add Option
            </button>
        </div>

        @foreach ($options as $index => $option)
            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700">Option {{ $index + 1 }}</label>
                <div class="flex gap-2">
                    <input type="text" wire:model.live="options.{{ $index }}"
                        class="flex-grow px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300"
                        wire:click.prevent="removeOption({{ $index }})">
                        Remove
                    </button>
                </div>
                @error("options.{$index}")
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-md transition duration-300 mt-6">
            Create Poll
        </button>
    </form>
</div>
