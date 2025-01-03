<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<div x-data="{ isOpen: false }" class="relative">
    <!-- Fixed Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-base-100 border-b border-base-200 z-50 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary" wire:navigate>
                        <span class="text-base-content">Brand</span>Logo
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:items-center lg:gap-8">
                    <div class="flex gap-4">
                        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm" wire:navigate>Home</a>
                        <a href="{{ route('apilist') }}" class="btn btn-ghost btn-sm" wire:navigate>APIs</a>
                        <a href="{{ route('plans') }}" class="btn btn-ghost btn-sm" wire:navigate>Plans</a>
                        <a href="#" class="btn btn-ghost btn-sm">About</a>
                        <a href="#" class="btn btn-ghost btn-sm">Contact</a>
                        <a href="/admin" class="btn btn-ghost btn-sm" target="_blank">Admin</a>
                    </div>
                    <div class="flex items-center gap-4">
                       
                           {{-- settings dropdown --}}
                           {{-- auth check --}}
                @auth
                <!-- Settings Dropdown -->
           <div class="hidden sm:flex sm:items-center sm:ms-6">
               <x-dropdown align="right" width="48">
                   <x-slot name="trigger">
                       <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">

                           <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                           <div class="ms-1">
                               <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                   <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                               </svg>
                           </div>
                       </button>
                   </x-slot>

                   <x-slot name="content">
                       <x-dropdown-link :href="route('profile')" wire:navigate>
                           {{ __('Profile') }}
                       </x-dropdown-link>

                       <!-- Authentication -->
                       <button wire:click="logout" class="w-full text-start">
                           <x-dropdown-link>
                               {{ __('Log Out') }}
                           </x-dropdown-link>
                       </button>
                   </x-slot>
               </x-dropdown>

               
           </div>
           @endauth

           @guest
           <a href="{{ route('login') }}" class="btn btn-ghost btn-sm" wire:navigate>Login</a>
           @endguest
                           {{--  --}}
                         <!-- Add this button right here -->
                <button @click="darkMode= !darkMode" type="button" class="relative inline-flex flex-shrink-0 h-6 mx-5 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-zinc-200 dark:bg-zinc-700 w-11 focus:outline-none focus:ring-2 focus:ring-neutral-700 focus:ring-offset-2" role="switch" aria-checked="false">
                   <span class="sr-only">Use setting</span>
                   <span class="relative inline-block w-5 h-5 transition duration-500 ease-in-out transform translate-x-0 bg-white rounded-full shadow pointer-events-none dark:translate-x-5 ring-0">
                      <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-500 ease-in opacity-100 dark:opacity-0 dark:duration-100 dark:ease-out" aria-hidden="true">
                         {{-- 
                         <x-svg class="w-4 h-4 text-neutral-700" svg="sun"/>
                         --}}
                         <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun w-4 h-4 text-neutral-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                         </svg>
                      </span>
                      <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-100 ease-out opacity-0 dark:opacity-100 dark:duration-200 dark:ease-in" aria-hidden="true">
                         {{-- 
                         <x-svg class="w-4 h-4 text-neutral-700" svg="moon"/>
                         --}}
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon w-4 h-4 text-neutral-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                         </svg>
                      </span>
                   </span>
                </button>
                {{--  --}}
                
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button 
                        @click="isOpen = !isOpen" 
                        type="button" 
                        class="btn btn-ghost btn-circle"
                        aria-label="Toggle menu"
                    >
                        <i class="fas" :class="isOpen ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div 
                x-show="isOpen" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
                class="lg:hidden absolute left-0 right-0 bg-base-100 border-b border-base-200 shadow-xl"
                @click.away="isOpen = false"
            >
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Home</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Products</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Services</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">About</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Contact</a>
                    
                    <div class="pt-4 pb-3 border-t border-base-300">
                        <div class="flex items-center px-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://api.dicebear.com/7.x/avataaars/svg?seed=John" alt="Avatar">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium">John Doe</div>
                                <div class="text-sm text-base-content/70">john@example.com</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Profile</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Settings</a>
                            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-base-200 transition-colors duration-200">Logout</a>
                        </div>
                    </div>

                    <div class="pt-4 pb-3">
                        <button class="btn btn-primary w-full">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div class="h-16"></div>

    
</div>