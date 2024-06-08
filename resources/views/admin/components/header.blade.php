<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto sticky w-full z-20 top-0">

        <div class="flex flex-wrap items-center w-full justify-between">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home" class=" flex flex-row items-center font-semibold">
                    <span class="p-2 scale-75">
                        <img src="/favicon.ico" alt="icon">
                    </span>
                    Admin | Tanamas Industry Comunitas
                </a>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">

                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2">
                                <span class="pr-2">
                                    <i class="em em-robot_face"></i>
                                </span>
                                Hi, @auth {{ auth()->user()->name }} @endauth
                                <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>

                            <div id="myDropdown"
                                class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible min-w-40 rounded-lg">
                                <a href="#"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                    <i class="fa fa-user fa-fw"></i>
                                    Profile
                                </a>
                                <a href="#"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                    <i class="fa fa-cog fa-fw"></i>
                                    Settings
                                </a>
                                <div class="border border-gray-800"></div>
                                <a href="{{ route('login.destroy', null, true) }}"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">
                                    <i class="fas fa-sign-out-alt fa-fw"></i>
                                    Log Out
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
