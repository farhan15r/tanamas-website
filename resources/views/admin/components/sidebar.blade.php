@php
    // get path of current route
    $path = request()->route()->getName();
    $path = explode('.', $path); // admin.users.xxx => ['admin', 'users', 'xxx']
    $path = $path[1];
@endphp

<nav aria-label="alternative nav" class="bg-gray-800 ">
    <div class="bottom-0 md:relative z-10 w-full md:w-48 content-center">

        <div class="md:w-48 content-center md:content-start text-left justify-between h-full">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{ route('admin.users.index') }}"
                        class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 {{ $path == 'users' ? 'border-red-400' : '' }}"
                        >
                        <i class="fa-solid fa-user pr-0 md:p-3"></i>
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">
                            Users
                        </span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('admin.products.index') }}"
                        class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500 {{ $path == 'roducts' ? 'border-red-400' : '' }}">
                        <i class="fa-solid fa-boxes-stacked pr-0 md:p-3"></i>
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">
                            Products
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
