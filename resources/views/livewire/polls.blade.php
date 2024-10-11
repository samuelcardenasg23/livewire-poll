<div>
    @forelse ($polls as $poll)
        <div class="card">
            <h3 class="text-xl font-bold mb-4 text-blue-400">{{ $poll->title }}</h3>

            <div class="space-y-3">
                @foreach ($poll->options as $option)
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300">{{ $option->name }}</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-400">({{ $option->votes->count() }} votes)</span>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm transition duration-300"
                                wire:click="vote({{ $option->id }})">
                                Vote
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-8">No polls found</div>
    @endforelse

    <div class="mt-4">
        {{ $polls->links() }}
    </div>
</div>
