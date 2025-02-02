<div>
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">Featured Collections</h1>
            <div class="flex justify-center gap-2 flex-wrap">
                <button class="btn btn-sm btn-primary">All</button>
                <button class="btn btn-sm btn-ghost">Popular</button>
                <button class="btn btn-sm btn-ghost">Latest</button>
                <button class="btn btn-sm btn-ghost">Trending</button>
            </div>
        </div>

        <!-- Featured Card -->
        <div class="mb-12">
            <div class="card lg:card-side bg-base-100 shadow-xl">
                <figure class="lg:w-1/2">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Featured" class="h-full w-full object-cover" />
                </figure>
                <div class="card-body lg:w-1/2">
                    <div class="badge badge-secondary">Featured</div>
                    <h2 class="card-title text-2xl">Special Collection</h2>
                    <p>Experience our handpicked selection of premium items that define excellence and style.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($apis as $api)
             <!-- Card 1 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">{{$api->name}}</h2>
                        <div class="badge badge-primary">New</div>
                    </div>
                    <p>{{ $api->description }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                        </div>
                        <span class="text-sm opacity-70">(4.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                    <a href="{{ route('apiplayground', ['api' => $api->name]) }}"  class="btn btn-primary btn-sm">View Details</a>
                        
                    </div>
                </div>
            </div>
            @endforeach
           

            {{-- <!-- Card 2 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">Urban Living</h2>
                        <div class="badge badge-secondary">Popular</div>
                    </div>
                    <p>Modern comfort in the heart of the city</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                        </div>
                        <span class="text-sm opacity-70">(5.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">Coastal Paradise</h2>
                        <div class="badge badge-accent">Featured</div>
                    </div>
                    <p>Beachfront living at its finest</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" />
                        </div>
                        <span class="text-sm opacity-70">(4.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">Desert Oasis</h2>
                        <div class="badge badge-ghost">Limited</div>
                    </div>
                    <p>Luxury amid the golden sands</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rating-4" class="mask mask-star-2 bg-orange-400" />
                        </div>
                        <span class="text-sm opacity-70">(3.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">Forest Haven</h2>
                        <div class="badge badge-secondary">Trending</div>
                    </div>
                    <p>Secluded comfort in the woods</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-5" class="mask mask-star-2 bg-orange-400" />
                        </div>
                        <span class="text-sm opacity-70">(4.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <figure class="px-4 pt-4">
                    <img src="https://www.tailwindai.dev/placeholder.svg" alt="Product" class="rounded-xl h-48 w-full object-cover" />
                </figure>
                <div class="card-body">
                    <div class="flex justify-between items-start">
                        <h2 class="card-title">Lake View</h2>
                        <div class="badge badge-primary">New</div>
                    </div>
                    <p>Tranquil waterfront escape</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" checked />
                        </div>
                        <span class="text-sm opacity-70">(5.0)</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="btn btn-outline">Load More</button>
        </div>

        <!-- Newsletter Section -->
        {{-- <div class="mt-16">
            <div class="card bg-primary text-primary-content">
                <div class="card-body text-center">
                    <h2 class="card-title justify-center text-2xl mb-4">Stay Updated</h2>
                    <p class="max-w-md mx-auto mb-6">Subscribe to our newsletter for the latest updates and exclusive offers.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <input type="email" placeholder="Enter your email" class="input input-bordered w-full max-w-xs" />
                        <button class="btn btn-secondary">Subscribe</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
