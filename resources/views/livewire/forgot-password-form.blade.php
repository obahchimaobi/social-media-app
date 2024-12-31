<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @section('title')
        Forgot Password
    @endsection
    
    @section('content')
        <div class="flex justify-center items-center h-screen bg-[url('/public/images/social.png')]">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700 w-[400px] mx-auto">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                            Remember your password?
                            <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                href="{{ route('login') }}" wire:navigate>
                                Sign in here
                            </a>
                        </p>
                    </div>
    
                    <div class="mt-5">
                        <!-- Form -->
                        <livewire:auth.forgot-password-form />
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
