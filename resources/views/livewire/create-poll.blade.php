<div class="card">
    <form wire:submit="createPoll">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-400">Create a New Poll</h2>

        <div class="mb-6">
            <label for="title">Poll Title</label>
            <input type="text" id="title" wire:model.live="title">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <button type="button"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300"
                wire:click.prevent="addOption">
                Add Option
            </button>
        </div>

        @foreach ($options as $index => $option)
            <div class="mb-4">
                <label>Option {{ $index + 1 }}</label>
                <div class="flex gap-2">
                    <input type="text" wire:model.live="options.{{ $index }}">
                    <button type="button"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm transition duration-300"
                        wire:click.prevent="removeOption({{ $index }})">
                        Remove
                    </button>
                </div>
                @error("options.{$index}")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 mt-6">
            Create Poll
        </button>
    </form>
</div>
