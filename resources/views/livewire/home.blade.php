<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-24">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <a href='/admin' target="_blank"><x-mary-button class="btn-primary">Admin</x-mary-button></a>

    {{-- login --}}
    <a href='/login' target="_blank"><x-mary-button class="btn-primary">Login</x-mary-button></a>
    {{-- plans route --}}
    <a href='{{ route('plans') }}' target="_blank"><x-mary-button class="btn-primary">Plans</x-mary-button></a>

    {{-- hr --}}
    <hr class="my-4">
    {{-- spacer --}}
    <div class="my-4"></div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
        <div class="drawer-content flex flex-col">
            <div class="w-full navbar bg-base-300">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <i class="fas fa-bars"></i>
                    </label>
                </div> 
                <div class="flex-1 px-2 mx-2 text-2xl font-bold">APIMarket</div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#docs">Documentation</a></li>
                        <li><a class="btn btn-primary">Get Started</a></li>
                    </ul>
                </div>
            </div>

            <section class="hero min-h-[70vh] bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-3xl">
                        <h1 class="text-5xl font-bold mb-8">Discover & Connect with Premium APIs</h1>
                        <p class="text-xl mb-8">One marketplace, thousands of APIs. Build faster, better, and smarter with our curated collection of high-quality APIs.</p>
                        <div class="flex justify-center gap-4 flex-wrap">
                            <button class="btn btn-primary btn-lg">Browse APIs</button>
                            <button class="btn btn-outline btn-lg">Publish Your API</button>
                        </div>
                        <div class="stats shadow mt-8">
                            <div class="stat">
                                <div class="stat-title">APIs Available</div>
                                <div class="stat-value text-primary">5,000+</div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">Active Developers</div>
                                <div class="stat-value text-secondary">50K+</div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">Daily Requests</div>
                                <div class="stat-value text-accent">1M+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="features" class="py-16 bg-base-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl font-bold text-center mb-12">Why Choose Our Marketplace?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="card bg-base-200 shadow-xl">
                            <div class="card-body items-center text-center">
                                <i class="fas fa-shield-alt text-4xl text-primary mb-4"></i>
                                <h3 class="card-title">Secure & Reliable</h3>
                                <p>Enterprise-grade security with 99.9% uptime guarantee</p>
                            </div>
                        </div>
                        <div class="card bg-base-200 shadow-xl">
                            <div class="card-body items-center text-center">
                                <i class="fas fa-bolt text-4xl text-secondary mb-4"></i>
                                <h3 class="card-title">Lightning Fast</h3>
                                <p>Global CDN ensures minimal latency worldwide</p>
                            </div>
                        </div>
                        <div class="card bg-base-200 shadow-xl">
                            <div class="card-body items-center text-center">
                                <i class="fas fa-code text-4xl text-accent mb-4"></i>
                                <h3 class="card-title">Developer First</h3>
                                <p>Comprehensive documentation and support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="categories" class="py-16 bg-base-200">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl font-bold text-center mb-12">Popular API Categories</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                            <div class="card-body">
                                <i class="fas fa-cloud text-3xl text-primary mb-4"></i>
                                <h3 class="card-title">Weather APIs</h3>
                                <p>Real-time weather data and forecasts</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-primary">Explore</button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                            <div class="card-body">
                                <i class="fas fa-money-bill-wave text-3xl text-secondary mb-4"></i>
                                <h3 class="card-title">Payment APIs</h3>
                                <p>Secure payment processing solutions</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-secondary">Explore</button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                            <div class="card-body">
                                <i class="fas fa-language text-3xl text-accent mb-4"></i>
                                <h3 class="card-title">Translation APIs</h3>
                                <p>Multi-language translation services</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-accent">Explore</button>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                            <div class="card-body">
                                <i class="fas fa-map-marked-alt text-3xl text-info mb-4"></i>
                                <h3 class="card-title">Maps APIs</h3>
                                <p>Location and mapping services</p>
                                <div class="card-actions justify-end">
                                    <button class="btn btn-sm btn-info">Explore</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="pricing" class="py-16 bg-base-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl font-bold text-center mb-12">Simple, Transparent Pricing</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="card bg-base-200 shadow-xl">
                            <div class="card-body">
                                <h3 class="card-title text-2xl">Basic</h3>
                                <p class="text-4xl font-bold my-4">$29<span class="text-sm font-normal">/month</span></p>
                                <ul class="space-y-2 mb-4">
                                    <li><i class="fas fa-check text-success mr-2"></i>10,000 API calls</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>Basic support</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>99.9% uptime SLA</li>
                                </ul>
                                <button class="btn btn-primary w-full">Get Started</button>
                            </div>
                        </div>
                        <div class="card bg-primary text-primary-content shadow-xl">
                            <div class="card-body">
                                <h3 class="card-title text-2xl">Pro</h3>
                                <p class="text-4xl font-bold my-4">$99<span class="text-sm font-normal">/month</span></p>
                                <ul class="space-y-2 mb-4">
                                    <li><i class="fas fa-check mr-2"></i>100,000 API calls</li>
                                    <li><i class="fas fa-check mr-2"></i>Priority support</li>
                                    <li><i class="fas fa-check mr-2"></i>99.99% uptime SLA</li>
                                    <li><i class="fas fa-check mr-2"></i>Advanced analytics</li>
                                </ul>
                                <button class="btn btn-secondary w-full">Get Started</button>
                            </div>
                        </div>
                        <div class="card bg-base-200 shadow-xl">
                            <div class="card-body">
                                <h3 class="card-title text-2xl">Enterprise</h3>
                                <p class="text-4xl font-bold my-4">Custom</p>
                                <ul class="space-y-2 mb-4">
                                    <li><i class="fas fa-check text-success mr-2"></i>Unlimited API calls</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>24/7 support</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>99.999% uptime SLA</li>
                                    <li><i class="fas fa-check text-success mr-2"></i>Custom solutions</li>
                                </ul>
                                <button class="btn btn-outline w-full">Contact Sales</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer p-10 bg-neutral text-neutral-content">
                <div>
                    <span class="footer-title">Services</span> 
                    <a class="link link-hover">API Directory</a>
                    <a class="link link-hover">Documentation</a>
                    <a class="link link-hover">Pricing</a>
                    <a class="link link-hover">Support</a>
                </div> 
                <div>
                    <span class="footer-title">Company</span> 
                    <a class="link link-hover">About us</a>
                    <a class="link link-hover">Contact</a>
                    <a class="link link-hover">Careers</a>
                    <a class="link link-hover">Press kit</a>
                </div> 
                <div>
                    <span class="footer-title">Legal</span> 
                    <a class="link link-hover">Terms of use</a>
                    <a class="link link-hover">Privacy policy</a>
                    <a class="link link-hover">Cookie policy</a>
                </div>
            </footer>
        </div> 
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label> 
            <ul class="menu p-4 w-80 min-h-full bg-base-200">
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#docs">Documentation</a></li>
                <li><a class="btn btn-primary mt-4">Get Started</a></li>
            </ul>
        </div>
    </div>


</div>
