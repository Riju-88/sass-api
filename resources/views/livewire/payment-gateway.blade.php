<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Gateway') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-xl p-8 max-w-2xl w-full">
            <!-- Order Summary -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold mb-6 flex justify-center items-center space-x-2 text-gray-700">
                    <x-filament::icon
               
                icon="heroicon-o-document-text"
                
                class="h-8 w-8 text-accent dark:text-gray-400"
            />
                    <span>Order Summary</span>
                </h3>
                </div>
           
    
                <hr class="border-gray-300 mb-8">
    
               

          
    
            <hr class="border-gray-300 mb-8">

             {{-- Payment Details --}}
             <div class="mb-8">
                <h3 class="text-2xl font-bold mb-6 flex items-center space-x-2 text-gray-700 ">
                    <x-filament::icon
               
                icon="heroicon-s-credit-card"
                
                class="h-8 w-8 text-accent dark:text-gray-400"
            />
                    <span>Payment Details</span>
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-600 bg-slate-200 p-4 rounded-2xl">
                    <div>
                        {{-- 'selected_plan', [
                'id' => $plan->id,
                'name' => $plan->name,
                'price' => $plan->price, --}}
                        <p><strong>Plan Name:</strong> {{ session('selected_plan')['name'] }}</p>
                       
                        <p><strong>Plan Price:</strong> Rs. {{ session('selected_plan')['price'] }}</p>
                    </div>
                    
                </div>
            </div>

            <hr class="border-gray-300 mb-8">
            
            <!-- Payment Button -->
            <div class="flex justify-center">
                
                    <form action="{{ route('payment-gateway.store') }}" method="POST" class="flex justify-center items-center cursor-pointer btn btn-accent btn-wide text-green-100 shadow-lg text-2xl">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_API_KEY') }}"
                            data-amount="{{ session('selected_plan')['price'] * 100 }}"
                            data-buttontext="Pay {{ session('selected_plan')['price'] }} INR"
                            data-name="{{ config('app.name') }}"
                            data-description="A demo razorpay payment"
                            data-image="https://pic.onlinewebfonts.com/svg/img_517853.png"
                            data-prefill.name="{{ Auth::user()->name }}"
                            data-prefill.email="{{ Auth::user()->email }}"
                            data-theme.color="#ff7529">
                        </script>
                    </form>
                
                </div>
            </div>
        </div>
        </div>

