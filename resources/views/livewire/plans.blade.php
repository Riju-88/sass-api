<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Choose Your Plan</h2>

    @if (session()->has('success'))
        <div class="alert alert-success bg-green-200 dark:bg-green-900 p-4 rounded mb-4 text-green-700 dark:text-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger bg-red-200 dark:bg-red-900 p-4 rounded mb-4 text-red-700 dark:text-red-200">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($plansWithDetails as $plan)
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">{{ $plan->name }}</h3>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">{{ $plan->description }}</p>
                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                    ${{ $plan->price }} 
                    <span class="text-sm text-gray-500 dark:text-gray-400">/ month</span>
                </div>
    
                <button 
                    wire:click="assignPlan({{ $plan->id }})" 
                    class="w-full bg-blue-500 dark:bg-blue-600 text-white py-2 rounded-lg mt-4 hover:bg-blue-600 dark:hover:bg-blue-700">
                    Subscribe Now
                </button>
            </div>
        @endforeach
    </div>
</div>
