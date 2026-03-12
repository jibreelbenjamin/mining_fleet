@php
    $title  = 'Welcome'
@endphp
<x-head :title='$title'>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-md mt-7 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-xl shadow-2xs">
          <div class="p-4 sm:p-7">
            <div class="text-center">
              <h3 id="hs-modal-signin-label" class="block text-2xl font-bold text-gray-800 dark:text-neutral-200">MiningFleet Sign-In</h3>
              <p class="mt-2 text-sm text-gray-600 dark:text-neutral-300">
                Silahkan lengkapi informasi dibawah!
              </p>
            </div>
        
            <div class="mt-5">
              <!-- Form -->
              <form method="post" action="{{ route('login.action') }}">
                @csrf
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                    <label for="email" class="block text-sm mb-2 text-gray-800 dark:text-neutral-200">Alamat email</label>
                    <div class="relative">
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" placeholder="me@example.com" autocomplete="off">
                        <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        </div>
                    </div>
                    <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div>
                    <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200">Password</label>
                    <div class="relative">
                        <input id="hs-toggle-password" name="password" type="password" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" placeholder="Masukan password">
                        <button type="button" data-hs-toggle-password='{
                            "target": "#hs-toggle-password"
                        }' class="absolute inset-y-0 end-0 flex items-center z-20 px-5 cursor-pointer text-gray-400 dark:text-neutral-500 rounded-e-md focus:outline-hidden focus:text-blue-700 dark:focus:text-blue-600">
                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                            <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                            <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                            <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"/>
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"/>
                        </svg>
                        </button>
                    </div>
                    </div>
                    <!-- End Form Group -->
        
                  <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 dark:bg-blue-500 border border-transparent text-white hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-hidden focus:bg-blue-700 dark:focus:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">Masuk</button>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div>
    </div>
</x-head>
