

  

    <div class="">  {{-- spacer --}}
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <!-- Hero Section -->
 <section id="hero" class="bg-base-100 text-center py-16 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6">Discover & Connect with Premium APIs</h1>
    <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto mb-8">
        Explore a wide range of APIs designed for developers, businesses, and more.
    </p>
    <div>
        <button class="btn btn-primary">Get Started</button>
        <button class="btn btn-outline ml-4">Learn More</button>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900 dark:text-white">
    <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-8">Our Features</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="card p-6 shadow-lg bg-white dark:bg-gray-800 dark:text-white">
            <h3 class="text-xl font-semibold mb-4">Feature One</h3>
            <p class="text-gray-600">A brief description of the feature goes here.</p>
        </div>
        <div class="card p-6 shadow-lg bg-white dark:bg-gray-800 dark:text-white">
            <h3 class="text-xl font-semibold mb-4">Feature Two</h3>
            <p class="text-gray-600">A brief description of the feature goes here.</p>
        </div>
        <div class="card p-6 shadow-lg bg-white dark:bg-gray-800 dark:text-white">
            <h3 class="text-xl font-semibold mb-4">Feature Three</h3>
            <p class="text-gray-600">A brief description of the feature goes here.</p>
        </div>
    </div>
</section>

<!-- Popular Categories -->
<section id="categories" class="py-12 px-4 sm:px-6 lg:px-8 bg-base-100">
    <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-8">Popular Categories</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card p-4 shadow bg-gray-50">
            <h3 class="text-lg font-medium">Category One</h3>
        </div>
        <div class="card p-4 shadow bg-gray-50">
            <h3 class="text-lg font-medium">Category Two</h3>
        </div>
        <div class="card p-4 shadow bg-gray-50">
            <h3 class="text-lg font-medium">Category Three</h3>
        </div>
        <div class="card p-4 shadow bg-gray-50">
            <h3 class="text-lg font-medium">Category Four</h3>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-8">Pricing Plans</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="card p-6 shadow-lg bg-white">
            <h3 class="text-xl font-semibold mb-4">Basic Plan</h3>
            <p class="text-gray-600">Description of the basic plan.</p>
            <p class="text-xl font-bold mt-4">$10/month</p>
        </div>
        <div class="card p-6 shadow-lg bg-white">
            <h3 class="text-xl font-semibold mb-4">Standard Plan</h3>
            <p class="text-gray-600">Description of the standard plan.</p>
            <p class="text-xl font-bold mt-4">$20/month</p>
        </div>
        <div class="card p-6 shadow-lg bg-white">
            <h3 class="text-xl font-semibold mb-4">Premium Plan</h3>
            <p class="text-gray-600">Description of the premium plan.</p>
            <p class="text-xl font-bold mt-4">$30/month</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-8 px-4 sm:px-6 lg:px-8 bg-neutral text-neutral-content grid grid-cols-1 md:grid-cols-3">
    <div>
        <h3 class="font-bold mb-2">About Us</h3>
        <p class="text-sm">Information about the company.</p>
    </div>
    <div>
        <h3 class="font-bold mb-2">Links</h3>
        <ul class="text-sm">
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Pricing</a></li>
        </ul>
    </div>
    <div>
        <h3 class="font-bold mb-2">Contact</h3>
        <p class="text-sm">Email: info@example.com</p>
    </div>
</footer>
    </div>



