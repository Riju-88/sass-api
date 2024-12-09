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

</div>
