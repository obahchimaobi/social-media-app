<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($errorMessage)
        <div>
            <!-- Toast -->
            <div id="dismiss-toast"
                class="fixed top-2 right-2 z-50 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-500"
                role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                <div class="flex p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                            </path>
                        </svg>
                    </div>

                    <div class="ms-3">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-gray-700 dark:text-neutral-400">
                            {{ $errorMessage }}
                        </p>
                    </div>

                    <div class="ms-auto">
                        <button type="button"
                            class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 dark:text-white"
                            aria-label="Close" data-hs-remove-element="#dismiss-toast">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Toast -->
        </div>
    @endif

    <form wire:submit.prevent='login'>
        @csrf
        <div class="grid gap-y-4">
            <!-- Form Group -->
            <div>
                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        required aria-describedby="email-error" wire:model='email'>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
                @error('email')
                    <p class="text-sm text-red-600 mt-2" id="email-error">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                    <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('forgot.password') }}" wire:navigate>Forgot password?</a>
                </div>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        required aria-describedby="password-error" wire:model='password'>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 mt-2" id="password-error">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Checkbox -->
            <div class="flex items-center">
                <div class="flex">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                </div>
                <div class="ms-3">
                    <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                </div>
            </div>
            <!-- End Checkbox -->

            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                in</button>
        </div>
    </form>
</div>
