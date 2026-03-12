@php
    $title = "Update password";
    $id_data = 'id_user';
    $echo = "pengguna";
    $page = 'user';
@endphp
<x-app :page='$page' :title='$title'>
<!-- Hire Us -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-xl mx-auto">
    <div class="text-center">
      <h1 class="text-xl font-bold text-gray-800 dark:text-neutral-200 sm:text-2xl">
        {{ $title }}
      </h1>
      <p class="mt-1 text-gray-600 dark:text-neutral-300">
        Memperbarui password pengguna dalam sistem
      </p>
    </div>

    <div class="mt-9">
      <!-- Form -->
      <form method="post" action="{{ route('dashboard.'.$page.'.update-password.action', $data->$id_data) }}">
        @csrf
        @method('PUT')
        <div class="grid gap-4 lg:gap-6">
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Informasi pengguna</label>
                <input disabled type="text" value="{{ $data->nama }} ({{ $data->email }})" autocomplete="off" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>
 
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Password</label>
                <div class="relative">
                  <input id="hs-toggle-password" name="password" type="password" placeholder="Masukan password min.8" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
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
 
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Konfirmasi Password</label>
                <div class="relative">
                  <input id="hs-toggle-password-confirm" name="password_confirmation" type="password" placeholder="Masukan ulang password" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
                  <button type="button" data-hs-toggle-password='{
                      "target": "#hs-toggle-password-confirm"
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
        </div>
        <!-- End Grid -->

        <div class="mt-6 grid">
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 dark:bg-blue-500 border border-transparent text-white hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-hidden focus:bg-blue-700 dark:focus:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            Update password</button>
        </div>

        <div class="flex justify-center w-full mt-3 text-center">
          <a class="flex gap-x-1 items-center justify-center text-sm text-gray-500 dark:text-neutral-400" href="{{ route('dashboard.'.$page) }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            Kembali
          </a>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
<!-- End Hire Us -->
</x-app>

