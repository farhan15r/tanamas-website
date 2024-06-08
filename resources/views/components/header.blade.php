<header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
    <div class="hidden md:flex justify-between items-center py-2 border-b text-sm"
        style="border-color: rgba(255,255,255,.25)">
        <div class="w-full">
            <ul class="flex text-white justify-between">
                <li class=" flex flex-row gap-3">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-white"
                            viewBox="0 0 24 24">
                            <path
                                d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                        </svg>

                        <a href="https://maps.app.goo.gl/N1VbEuHse9cBQVZFA" target="_blank">
                            <span class="ml-2">
                                Tomang Ancak, West Jakarta, Indonesia
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-white"
                            viewBox="0 0 24 24">
                            <path
                                d="M12,2C7.589,2,4,5.589,4,9.995C3.971,16.44,11.696,21.784,12,22c0,0,8.029-5.56,8-12C20,5.589,16.411,2,12,2z M12,14 c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S14.21,14,12,14z" />
                        </svg>

                        <a href="https://maps.app.goo.gl/DLVPwPHuZCcJBLhi6" target="_blank">
                            <span class="ml-2">
                                Cirebon, West Java, Indonesia
                            </span>
                        </a>
                    </div>
                </li>
                <li class="ml-6">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-white"
                            viewBox="0 0 24 24">
                            <path
                                d="M14.594,13.994l-1.66,1.66c-0.577-0.109-1.734-0.471-2.926-1.66c-1.193-1.193-1.553-2.354-1.661-2.926l1.661-1.66 l0.701-0.701L5.295,3.293L4.594,3.994l-1,1C3.42,5.168,3.316,5.398,3.303,5.643c-0.015,0.25-0.302,6.172,4.291,10.766 C11.6,20.414,16.618,20.707,18,20.707c0.202,0,0.326-0.006,0.358-0.008c0.245-0.014,0.476-0.117,0.649-0.291l1-1l0.697-0.697 l-5.414-5.414L14.594,13.994z" />
                        </svg>

                        <a href="tel:+62215601862"><span class="ml-2">+62 21-5601862</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex flex-wrap items-center justify-between py-6">
        <div class="w-1/2 md:w-auto">
            <a href="{{ route('index', null, true) }}"
                class="text-white font-bold text-2xl flex flex-row items-center gap-3">
                <span>
                    <img src="/favicon.ico" alt="icon">
                </span>
                Tanamas Industry Comunitas
            </a>
        </div>

        <label for="menu-toggle" class="pointer-cursor md:hidden block"><svg class="fill-current text-white"
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg></label>

        <input class="hidden" type="checkbox" id="menu-toggle">

        <div class="hidden md:block w-full md:w-auto" id="menu">
            <nav
                class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none">
                <ul class="md:flex items-center">
                    <li>
                        <a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold" href="#">
                            About Us
                        </a>
                    </li>
                    <li class="md:ml-4">
                        <a class="py-2 inline-block md:text-white md:px-2 font-semibold" href="#">
                            Testimonials
                        </a>
                    </li>
                    <li class="md:ml-4 md:hidden lg:block">
                        <a class="py-2 inline-block md:text-white md:px-2 font-semibold" href="#">
                            Blog
                        </a>
                    </li>
                    <li class="md:ml-4">
                        <a class="py-2 inline-block md:text-white md:px-2 font-semibold" href="#">
                            Contact Us
                        </a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        @auth
                            <a class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded"
                                href="{{ route('login.destroy', null, true) }}">
                                Logut
                            </a>
                        @else
                            <a class="inline-block font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded"
                                href="{{ route('login.index', null, true) }}">
                                Login
                            </a>
                        @endauth
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
