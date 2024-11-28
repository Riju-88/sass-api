
<div class="container">

    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel 11 Razorpay Payment Gateway Integration - ItSolutionStuff.com</h3>
        <div class="card-body">

            @session('error')
                <div class="alert alert-danger" role="alert"> 
                    {{ $value }}
                </div>
            @endsession

            @session('success')
                <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                </div>
            @endsession

             <!-- Payment Button -->
             <div class="flex justify-center">
                
                <form action="{{ route('razorpay.payment.store') }}" method="POST" class="flex justify-center items-center cursor-pointer btn btn-accent btn-wide text-green-100 shadow-lg text-2xl">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_API_KEY') }}"
                        data-amount="{{ 1000 }}"
                        data-buttontext="Pay {{ 10 }} INR"
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