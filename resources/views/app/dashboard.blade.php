@php
    $title = "Dashboard";
    $echo = "dashboard";
    $page = 'dashboard';
@endphp
<x-app :page='$page' :title='$title'>
    <p>Selamat datang <br> <span class="text-xl font-bold">{{  Auth::user()->nama }}!</span></p>

    <!-- Stats -->
    <div class="grid sm:grid-cols-4 border-y border-gray-200 dark:border-neutral-700">
        <!-- Card -->
        <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-gray-200 dark:before:bg-neutral-700 first:before:bg-transparent">
        <div>
            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check-icon lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>

            <div class="mt-3">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
                Book Complete
            </p>
            <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
                    <p>{{ number_format($booking->where('status', 4)->count()) }} Booking</p>
                    <p class="text-xs font-normal -mt-0.5">Dari total {{ number_format($booking->count()) }}</p>
                </h3>
                <div class="mt-1 lg:mt-0">
                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs bg-gray-100 dark:bg-neutral-700 text-gray-800 dark:text-neutral-200 rounded-md">
                        {{ round(($booking->where('status', 4)->count() * 100) / $booking->count(), 2) }}%
                    </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-gray-200 dark:before:bg-neutral-700 first:before:bg-transparent">
        <div>
            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-icon lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>

            <div class="mt-3">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
                Book Approved
            </p>
            <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
                    <p>{{ number_format($booking->where('status', 2)->count()) }} Booking</p>
                    <p class="text-xs font-normal -mt-0.5">Dari total {{ number_format($booking->count()) }}</p>
                </h3>
                <div class="mt-1 lg:mt-0">
                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs bg-gray-100 dark:bg-neutral-700 text-gray-800 dark:text-neutral-200 rounded-md">
                        {{ round(($booking->where('status', 2)->count() * 100) / $booking->count(), 2) }}%
                    </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-gray-200 dark:before:bg-neutral-700 first:before:bg-transparent">
        <div>
            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x-icon lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>

            <div class="mt-3">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
                Book Rejected
            </p>
            <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
                    <p>{{ number_format($booking->where('status', 3)->count()) }} Booking</p>
                    <p class="text-xs font-normal -mt-0.5">Dari total {{ number_format($booking->count()) }}</p>
                </h3>
                <div class="mt-1 lg:mt-0">
                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs bg-gray-100 dark:bg-neutral-700 text-gray-800 dark:text-neutral-200 rounded-md">
                        {{ round(($booking->where('status', 3)->count() * 100) / $booking->count(), 2) }}%
                    </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-gray-200 dark:before:bg-neutral-700 first:before:bg-transparent">
        <div>
            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock8-icon lucide-clock-8"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l-4 2"/></svg>

            <div class="mt-3">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
                Book Pending
            </p>
            <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
                    <p>{{ number_format($booking->where('status', 1)->count()) }} Booking</p>
                    <p class="text-xs font-normal -mt-0.5">Dari total {{ number_format($booking->count()) }}</p>
                </h3>
                <div class="mt-1 lg:mt-0">
                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs bg-gray-100 dark:bg-neutral-700 text-gray-800 dark:text-neutral-200 rounded-md">
                        {{ round(($booking->where('status', 1)->count() * 100) / $booking->count(), 2) }}%
                    </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Stats -->

    <!-- Stats -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <!-- Card -->
    <div class="flex flex-col bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
            Kendaraan
            </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
            {{ number_format($vehicle->count()) }} Kendaraan
            </h3>
        </div>
        </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
            Sopir
            </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
            {{ number_format($driver->count()) }} Sopir
            </h3>
        </div>
        </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
            Pengguna Aktif
            </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
            {{ number_format($user->count()) }} User
            </h3>
        </div>
        </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="flex flex-col bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 shadow-2xs rounded-xl">
        <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-400">
            Log Aktivitas
            </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
            {{ number_format($log->count()) }} Log
            </h3>
        </div>
        </div>
    </div>
    <!-- End Card -->
    </div>
    <!-- End Stats -->

    {!! $dailyChart->container() !!}
    {!! $monthlyChart->container() !!}

    <script src="{{ $dailyChart->cdn() }}"></script>
    {{ $dailyChart->script() }}
    {{ $monthlyChart->script() }}

</x-app>
