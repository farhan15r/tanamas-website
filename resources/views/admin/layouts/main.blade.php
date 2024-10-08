<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.2/css/all.css">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @vite('resources/css/app.css')

    <title>Tanamas Industry Comunitas</title>
</head>

<body class="antialiased bg-slate-500 font-sans text-gray-900 h-dvh flex flex-col">
    @include('components.alert')

    @include('admin.components.header')

    <main class="flex flex-col md:flex-row h-full overflow-hidden">
        @include('admin.components.sidebar')

        <section class="p-8 flex justify-center w-full overflow-y-auto">
            @yield('content')
        </section>
    </main>

    @yield('scripts')

    <script src="/scripts/script.js"></script>

    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>
</body>

</html>
