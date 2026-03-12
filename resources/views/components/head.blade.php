<!DOCTYPE html>
<html lang="en" class="scroll-smooth relative h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/fav.svg') }}" >
    <title>{{ $title ? ucfirst($title).' - ' : '' }} MiningFleet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
    </script>
</head>
<body class="bg-gray-50 dark:bg-neutral-900 h-full">
    {{ $slot }}
    
    @if (session('successToast'))
    <x-toast type='normal' status='success'>
    {{ session('successToast') }}
    </x-toast>
    @endif
    @if (session('warningToast'))
    <x-toast type='normal' status='warning'>
    {{ session('warningToast') }}
    </x-toast>
    @endif
    <x-toast type='errors-has'></x-toast>
</body>
</html>