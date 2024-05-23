<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite('resources/css/app.css')

    <title>Tanamas Industry Comunitas</title>
</head>

<body class="antialiased bg-white font-sans text-gray-900">

    <main class="w-full">
        @include('components.header')

        @yield('content')

        @include('components.footer')

    </main>

    @yield('scripts')

</body>

</html>
