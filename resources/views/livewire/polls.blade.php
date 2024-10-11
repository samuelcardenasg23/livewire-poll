<div class="container mx-auto p-4">
    @forelse ($polls as $poll)
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h3 class="text-xl font-bold mb-4">{{ $poll->title }}</h3>

            <div class="space-y-3">
                @foreach ($poll->options as $option)
                    <div class="flex items-center justify-between">
                        <span class="text-gray-700">{{ $option->name }}</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">({{ $option->votes->count() }} votes)</span>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
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
</div>
