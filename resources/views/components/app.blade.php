<x-head>
    <!-- ========== HEADER ========== -->
    <header class="fixed top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 lg:z-61 w-full bg-gray-100 dark:bg-neutral-900 text-sm py-2.5">
    <nav class="px-4 sm:px-5.5 flex basis-full items-center w-full mx-auto">
        <div class="w-full flex items-center gap-x-1.5">
        <ul class="flex items-center gap-1.5">
            <li class="inline-flex items-center gap-1 relative pe-1.5 last:pe-0 last:after:hidden after:absolute after:top-1/2 after:end-0 after:inline-block after:w-px after:h-3.5 after:bg-gray-300 dark:after:bg-neutral-700 after:rounded-full after:-translate-y-1/2 after:rotate-12">
            <a class="shrink-0 inline-flex justify-center items-center bg-stone-800 dark:bg-white size-8 rounded-md text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="@@href" aria-label="Preline">
                <svg class="stroke-white dark:stroke-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stone-icon lucide-stone"><path d="M11.264 2.205A4 4 0 0 0 6.42 4.211l-4 8a4 4 0 0 0 1.359 5.117l6 4a4 4 0 0 0 4.438 0l6-4a4 4 0 0 0 1.576-4.592l-2-6a4 4 0 0 0-2.53-2.53z"/><path d="M11.99 22 14 12l7.822 3.184"/><path d="M14 12 8.47 2.302"/></svg>
            </a>

            <div class="hidden sm:block">

            </div>

            <!-- Sidebar Toggle -->
            <button type="button" class="p-1.5 size-7.5 inline-flex items-center gap-x-1 text-xs rounded-md border border-transparent text-gray-800 dark:text-neutral-200 hover:bg-gray-200 dark:hover:bg-neutral-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-600" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-pro-sidebar" data-hs-overlay="#hs-pro-sidebar">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M15 3v18"/><path d="m10 15-3-3 3-3"/></svg>
                <span class="sr-only">Sidebar Toggle</span>
            </button>
            <!-- End Sidebar Toggle -->
            </li>
        </ul>

        <ul class="flex flex-row items-center gap-x-3 ms-auto">
            <li class="hidden lg:inline-flex items-center gap-1.5 relative pe-3 last:pe-0 last:after:hidden after:absolute after:top-1/2 after:end-0 after:inline-block after:w-px after:h-3.5 after:bg-gray-300 dark:after:bg-neutral-700 after:rounded-full after:-translate-y-1/2 after:rotate-12">
            <button type="button" class="flex items-center gap-x-1.5 py-2 px-2.5 font-medium text-xs bg-gray-200 dark:bg-neutral-800 text-gray-800 dark:text-neutral-200 rounded-lg hover:text-blue-700 dark:hover:text-blue-600 focus:outline-hidden focus:text-blue-700 dark:focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none">
                <svg class="shrink-0 size-4 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg>
                Ask AI
            </button>

            <a class="flex items-center gap-x-1.5 py-1.5 px-2 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                Docs
            </a>

            <a class="flex items-center gap-x-1.5 py-1.5 px-2 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                API
            </a>
            </li>

            <li class="inline-flex items-center gap-1.5 relative pe-3 last:pe-0 last:after:hidden after:absolute after:top-1/2 after:end-0 after:inline-block after:w-px after:h-3.5 after:bg-gray-300 dark:after:bg-neutral-700 after:rounded-full after:-translate-y-1/2 after:rotate-12">
            <button type="button" class="relative hidden lg:flex justify-center items-center gap-x-1.5 size-8 text-sm text-gray-800 dark:text-neutral-200 rounded-full hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                <span class="sr-only">Knowledge Base</span>
            </button>

            <div class="h-8">
                <!-- Account Dropdown -->
                <div class="hs-dropdown inline-flex [--strategy:absolute] [--auto-close:inside] [--placement:bottom-right] relative text-start">
                <button id="hs-dnad" type="button" class="p-0.5 inline-flex shrink-0 items-center gap-x-3 text-start text-gray-800 dark:text-neutral-200 rounded-full hover:bg-gray-100 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">
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
                    <div class="px-4 py-2 border-t border-gray-200 dark:border-neutral-800">
                    <!-- Switch/Toggle -->
                    <div class="flex flex-wrap justify-between items-center gap-2">
                        <span class="flex-1 cursor-pointer text-sm text-gray-800 dark:text-neutral-200">Theme</span>
                        <div class="p-0.5 inline-flex cursor-pointer bg-gray-100 dark:bg-neutral-700 rounded-full">
                        <button type="button" class="size-7 flex justify-center items-center bg-white dark:bg-neutral-800 shadow-sm text-gray-800 dark:text-white rounded-full hs-auto-mode-active:bg-transparent hs-auto-mode-active:shadow-none hs-dark-mode-active:bg-transparent hs-dark-mode-active:shadow-none" data-hs-theme-click-value="default">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 3v1"/><path d="M12 20v1"/><path d="M3 12h1"/><path d="M20 12h1"/><path d="m18.364 5.636-.707.707"/><path d="m6.343 17.657-.707.707"/><path d="m5.636 5.636.707.707"/><path d="m17.657 17.657.707.707"/></svg>
                            <span class="sr-only">Default (Light)</span>
                        </button>
                        <button type="button" class="size-7 flex justify-center items-center text-gray-800 dark:text-white rounded-full hs-dark-mode-active:bg-gray-800 dark:hs-dark-mode-active:bg-neutral-100 hs-dark-mode-active:text-white dark:hs-dark-mode-active:text-neutral-800 hs-dark-mode-active:shadow-sm" data-hs-theme-click-value="dark">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                            <span class="sr-only">Dark</span>
                        </button>
                        <button type="button" class="size-7 flex justify-center items-center text-gray-800 dark:text-white rounded-full hs-auto-light-mode-active:bg-white dark:hs-auto-light-mode-active:bg-neutral-800 hs-auto-mode-active:shadow-sm" data-hs-theme-click-value="auto">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                            <span class="sr-only">Auto (System)</span>
                        </button>
                        </div>
                    </div>
                    <!-- End Switch/Toggle -->
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
            </li>
        </ul>
        </div>
    </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN SIDEBAR ========== -->
    <!-- Sidebar -->
    <div id="hs-pro-sidebar" class="hs-overlay [--body-scroll:true] lg:[--overlay-backdrop:false] [--is-layout-affect:true] [--opened:lg] [--auto-close:lg] hs-overlay-open:translate-x-0 lg:hs-overlay-layout-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-60 hidden fixed inset-y-0 z-60 start-0 bg-gray-100 dark:bg-neutral-900 lg:block lg:-translate-x-full lg:end-auto lg:bottom-0" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="lg:pt-13 relative flex flex-col h-full max-h-full">
        <!-- Body -->
        <nav class="p-3 size-full flex flex-col overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <div class="lg:hidden flex items-center justify-between">
            <button type="button" class="flex items-center gap-x-1.5 py-2 px-2.5 font-medium text-xs bg-gray-900 dark:bg-white text-white dark:text-neutral-800 rounded-lg focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg>
            {{ env("APP_NAME") }}
            </button>

            <!-- Sidebar Toggle -->
            <button type="button" class="p-1.5 size-7.5 inline-flex items-center gap-x-1 text-xs rounded-md text-gray-500 dark:text-neutral-400 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-pro-sidebar" data-hs-overlay="#hs-pro-sidebar">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Sidebar Toggle</span>
            </button>
            <!-- End Sidebar Toggle -->
        </div>

        <span class="lg:block hidden ps-2.5 mb-2 font-medium text-sm text-gray-500 dark:text-neutral-400">
        {{ env("APP_NAME") }}
        </span>

        <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
            <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
            Home
            </span>

            <!-- List -->
            <ul class="flex flex-col gap-y-1">
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
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
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Buat pemesanan
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Riwayat pemasanan
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Konsumsi BBM
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Pesetujuan
                </a>
            </li>
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
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Kendaraan
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                    Sopir
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800"  href="#">
                Jadwal servis
                </a>
            </li>
            </ul>
            <!-- End List -->
        </div>

        <div class="pt-3 mt-3 flex flex-col border-t border-gray-200 dark:border-neutral-800 first:border-t-0 first:pt-0 first:mt-0">
            <span class="block ps-2.5 mb-2 font-medium text-xs uppercase text-gray-500 dark:text-neutral-400">
            Admin
            </span>

            <!-- List -->
            <ul class="flex flex-col gap-y-1">
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                Manajemen pengguna
                </a>
            </li>
            <li>
                <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                Log Aktivitas
                </a>
            </li>
            </ul>
            <!-- End List -->
        </div>
        </nav>
        <!-- End Body -->

        <!-- Footer -->
        <footer class="mt-auto p-3 flex flex-col">
        <!-- List -->
        <ul class="flex flex-col gap-y-1">
            <li>
            <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
                What's new?
            </a>
            </li>
            <li>
            <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                Help & support
            </a>
            </li>
            <li class="lg:hidden">
            <a class="w-full flex items-center gap-x-2 py-2 px-2.5 text-sm text-gray-800 dark:text-neutral-200 rounded-lg hover:bg-gray-200 dark:hover:bg-neutral-800 focus:outline-hidden focus:bg-gray-200 dark:focus:bg-neutral-800" href="#">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                Knowledge Base
            </a>
            </li>
        </ul>
        <!-- End List -->
        </footer>
        <!-- End Footer -->
    </div>
    </div>
    <!-- End Sidebar -->
    <!-- ========== END MAIN SIDEBAR ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main class="lg:hs-overlay-layout-open:ps-60 bg-white dark:bg-neutral-800 transition-all duration-300 lg:fixed lg:inset-0 pt-16 pr-3 pb-3">
    <div class="ml-3 h-[calc(100dvh-62px)] lg:h-full overflow-hidden flex flex-col bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 shadow-xs rounded-lg">
        <!-- Body -->
        <div class="flex-1 flex flex-col overflow-y-auto [&::-webkit-scrollbar]:w-0">
        <div class="flex-1 flex flex-col lg:flex-row">
            <div class="flex-1 min-w-0 flex flex-col border-e border-gray-200 dark:border-neutral-700">
                {{ $slot }}
            </div>
        </div>
        </div>
        <!-- End Body -->
    </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
</x-head>