<!DOCTYPE html>
<html lang="en" class="w-full h-full">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module MediaLibrary</title>

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('css/medialibrary.css') }}">
       @livewireStyles

       <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>
    </head>
    <body class="w-full h-full">
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/medialibrary.js') }}"></script> --}}
        @livewireScripts
    </body>
</html>
