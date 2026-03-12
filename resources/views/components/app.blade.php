@php
    $sIdle = 'w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800';
    $sActive = 'w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg bg-gray-200 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800'
@endphp
<x-head :page='$page' :title='$title'>
    <!-- ========== HEADER ========== -->
    <header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 w-full bg-white dark:bg-neutral-800 border-b border-gray-200 dark:border-neutral-700 text-sm py-2.5 lg:ps-65">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-5 lg:me-0 lg:hidden">
        <!-- Logo -->
        <a class="flex items-center gap-x-2 rounded-md text-xl font-semibold" href="#" aria-label="Preline">
            <svg class="w-8 h-auto dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stone-icon lucide-stone"><path d="M11.264 2.205A4 4 0 0 0 6.42 4.211l-4 8a4 4 0 0 0 1.359 5.117l6 4a4 4 0 0 0 4.438 0l6-4a4 4 0 0 0 1.576-4.592l-2-6a4 4 0 0 0-2.53-2.53z"/><path d="M11.99 22 14 12l7.822 3.184"/><path d="M14 12 8.47 2.302"/></svg>
            <p class="flex flex-col leading-tight text-gray-800 dark:text-white">
                {{ env('APP_NAME') }}
                <span class="text-[10px] text-gray-500 dark:text-neutral-500">Aplikasi monitoring</span>
            </p>
        </a>
        <!-- End Logo -->

        <div class="lg:hidden ms-1">

        </div>
        </div>

        <div class="w-full flex items-center justify-end ms-auto lg:justify-between gap-x-1 md:gap-x-3">

        <div class="text-sm text-gray-500 dark:text-neutral-500 hidden lg:block">
            {{ $title }}
        </div>

        <div class="flex flex-row items-center justify-end gap-1">
            <!-- Account Dropdown -->
                <div class="hs-dropdown inline-flex [--strategy:absolute] [--auto-close:inside] [--placement:bottom-right] relative text-start">
                <button id="hs-dnad" type="button" class="p-0.5 inline-flex shrink-0 items-center gap-x-3 text-start text-gray-800 dark:text-neutral-200 rounded-full hover:bg-gray-100 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <img class="shrink-0 size-7 rounded-full" src="{{ asset('images/me.jpg') }}" alt="Avatar">
                </button>

                <!-- Account Dropdown -->
                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white dark:bg-neutral-900 border border-transparent rounded-xl shadow-xl" role="menu" aria-orientation="vertical" aria-labelledby="hs-dnad">
                    <div class="py-2 px-3.5">
                    <span class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ Auth::user()->nama }}
                    </span>
                    <p class="text-sm text-gray-500 dark:text-neutral-400">
                        {{ Auth::user()->email }}
                    </p>
                    </div>
                    <div class="p-1 border-t border-gray-200 dark:border-neutral-800">
                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-neutral-800 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800" href="{{ route('logout') }}">
                        <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                        Log out
                    </a>
                    </div>
                </div>
                <!-- End Account Dropdown -->
                </div>
                <!-- End Account Dropdown -->
        </div>
        </div>
    </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <div class="-mt-px">
    <!-- Breadcrumb -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white dark:bg-neutral-800 border-y border-gray-200 dark:border-neutral-700 px-4 sm:px-6 lg:px-8 lg:hidden">
        <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        <button type="button" class="size-8 flex justify-center items-center gap-x-2 bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white hover:text-gray-800-hover dark:hover:text-white-hover rounded-lg focus:outline-hidden focus:text-gray-800-focus dark:focus:text-white-focus disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/><path d="m8 9 3 3-3 3"/></svg>
        </button>
        <!-- End Navigation Toggle -->

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap">
            <li class="flex items-center text-sm text-gray-800 dark:text-neutral-200">
            {{ str_replace('_', ' ', env('APP_NAME')) }}
            <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            </li>
            <li class="text-sm font-semibold text-gray-800 dark:text-neutral-200 truncate" aria-current="page">
            {{ str_replace('-', ' ', ucfirst($page)) }}
            </li>
        </ol>
        <!-- End Breadcrumb -->
        </div>
    </div>
    <!-- End Breadcrumb -->
    </div>

    <!-- Sidebar -->
    <div id="hs-application-sidebar" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-65 h-full hidden fixed inset-y-0 start-0 z-60 bg-white dark:bg-neutral-800 border-e border-gray-200 dark:border-neutral-700 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4 flex items-center">
        <!-- Logo -->
        <a class="flex items-center gap-x-3 rounded-md text-xl font-semibold" href="{{ route('dashboard') }}" aria-label="{{ env("APP_NAME") }}">
            <svg class="w-10 h-auto dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stone-icon lucide-stone"><path d="M11.264 2.205A4 4 0 0 0 6.42 4.211l-4 8a4 4 0 0 0 1.359 5.117l6 4a4 4 0 0 0 4.438 0l6-4a4 4 0 0 0 1.576-4.592l-2-6a4 4 0 0 0-2.53-2.53z"/><path d="M11.99 22 14 12l7.822 3.184"/><path d="M14 12 8.47 2.302"/></svg>
            <p class="flex flex-col leading-tight text-gray-800 dark:text-white">
                {{ env('APP_NAME') }}
                <span class="text-[10px] text-gray-500 dark:text-neutral-500">Aplikasi monitoring</span>
            </p>
        </a>
        <!-- End Logo -->

        <div class="hidden lg:block ms-2">

        </div>
        </div>

        <!-- Content -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="mt-5 flex flex-col space-y-1">
                <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
                    <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
                    Home
                    </span>

                    <!-- List -->
                    <ul class="flex flex-col gap-y-1">
                    <li>
                        <a class="{{ $page == 'dashboard' ? $sActive : $sIdle }}"  href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    </ul>
                    <!-- End List -->
                </div>

                <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
                    <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
                    Booking
                    </span>

                    <!-- List -->
                    <ul class="flex flex-col gap-y-1">
                    @if (in_array(Auth::user()->role, ['admin', 'employee']))                        
                    <li>
                        <a class="{{ $page == 'booking' ? $sActive : $sIdle }}" href="{{ route('dashboard.booking') }}">
                            Pemesanan
                        </a>
                    </li>
                    @endif
                    
                    @if (in_array(Auth::user()->role, ['supervisor', 'manager']))                        
                    <li>
                        <a class="{{ $page == 'booking-list' ? $sActive : $sIdle }}" href="{{ route('dashboard.booking-list') }}">
                            Daftar pemasanan
                        </a>
                    </li>
                    @endif
                    
                    @if (in_array(Auth::user()->role, ['admin', 'employee']))   
                    <li>
                        <a class="{{ $page == 'fuel-log' ? $sActive : $sIdle }}" href="{{ route('dashboard.fuel-log') }}">
                            Konsumsi BBM
                        </a>
                    </li>
                    @endif

                    @if (in_array(Auth::user()->role, ['supervisor', 'manager']))                        
                    <li>
                        <a class="{{ $page == 'approval' ? $sActive : $sIdle }}" href="{{ route('dashboard.approval') }}">
                            Pesetujuan
                        </a>
                    </li>
                    @endif
                    </ul>
                    <!-- End List -->
                </div>
   
                <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
                    <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
                    Resource
                    </span>

                    <!-- List -->
                    <ul class="flex flex-col gap-y-1">
                    <li>
                        <a class="{{ $page == 'vehicle' ? $sActive : $sIdle }}" href="{{ route('dashboard.vehicle') }}">
                            Kendaraan
                        </a>
                    </li>
                    <li>
                        <a class="{{ $page == 'driver' ? $sActive : $sIdle }}" href="{{ route('dashboard.driver') }}">
                            Sopir
                        </a>
                    </li>
                    @if (in_array(Auth::user()->role, ['admin']))  
                    <li>
                        <a class="{{ $page == 'vehicle-service' ? $sActive : $sIdle }}" href="{{ route('dashboard.vehicle-service') }}">
                            Jadwal servis
                        </a>
                    </li>
                    @endif
                    </ul>
                    <!-- End List -->
                </div>

                <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
                    <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
                    Other
                    </span>

                    <!-- List -->
                    <ul class="flex flex-col gap-y-1">
                    @if (in_array(Auth::user()->role, ['admin']))
                    <li>
                        <a class="{{ $page == 'user' ? $sActive : $sIdle }}" href="{{ route('dashboard.user') }}">
                            Manajemen pengguna
                        </a>
                    </li>
                    @endif
                    <li>
                        <a class="{{ $page == 'log' ? $sActive : $sIdle }}" href="{{ route('dashboard.log') }}">
                            Log Aktivitas
                        </a>
                    </li>
                    <li>
                        <a class="{{ $sIdle }}" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>
                    </ul>
                    <!-- End List -->
                </div>
            </ul>
        </nav>
        </div>
        <!-- End Content -->
    </div>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        {{ $slot }}
    </div>
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
</x-head>