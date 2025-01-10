<div class="relative">
    <!-- Search Input -->
    <input
        type="text"
        wire:model.live="keyword"
        placeholder="Search APIs..."
        class="border px-3 py-2 rounded-md w-full bg-white text-black dark:bg-gray-800 dark:text-white"
    />

    <!-- API List -->
    @if (!empty($keyword) && !empty($apiList))
        <div class="absolute mt-1 left-0 w-full bg-white border border-gray-300 rounded-md shadow-lg z-10 dark:bg-gray-900 dark:border-gray-700">
            @foreach ($apiList as $api)
                <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer dark:hover:bg-gray-700">
                    <a href="{{ route('apiplayground', ['api' => $api]) }}">{{ $api }}</a>
                    
                </div>
            @endforeach
        </div>
    @elseif (!empty($keyword) && empty($apiList))
        <div class="absolute mt-1 left-0 w-full bg-white border border-gray-300 rounded-md shadow-lg z-10 dark:bg-gray-900 dark:border-gray-700">
            <p class="text-gray-500 px-3 py-2 dark:text-gray-400">No results found.</p>
        </div>
    @endif
</div>
