@extends('layouts.main')

@php
    $asteriskCSS = "after:content-['_*'] after:text-red-600";
@endphp

@section('content')
    @include('components.alert')

    <div class="bg-gray-100">
        <section
            class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex
                    items-center justify-center min-h-screen">
            <div class="h-full w-full absolute top-0 left-0 z-0">
                <img src="images/cover-bg1.jpg" alt="" class="h-full lg:h-full lg:w-full object-cover opacity-20"
                    loading="lazy">
            </div>

            <div class="z-10 w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 bg-gray-800">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-2xl text-white">
                        Create a new account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register.create') }}">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-white {{ $asteriskCSS }}">
                                Full Name
                            </label>
                            <input type="text" name="name" id="name"
                                class="border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Your name" required="" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white {{ $asteriskCSS }}">
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                class="@error('email') border-red-400 @enderror border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="name@company.com" required="" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- company name --}}
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium text-white">
                                Company Name
                            </label>
                            <input type="text" name="company" id="company"
                                class="border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Company Name" value="{{ old('company') }}">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white {{ $asteriskCSS }}">
                                Password
                            </label>
                            <input type="password" name="password" id="password" placeholder="" required=""
                                class="@error('password') border-red-400 @enderror border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            @error('password')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-white {{ $asteriskCSS }}">
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder=""
                                required=""
                                class="@error('password_confirmation') border-red-400 @enderror border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            @error('password_confirmation')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-block w-full font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded disabled:text-gray-500 disabled:border-gray-500">
                            Register
                        </button>
                        <p class="text-sm font-light text-gray-400">
                            Already have an account?
                            <a href="{{ route('login.index', null, true) }}"
                                class="font-medium text-primary-600 hover:underline text-primary-500">
                                Login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function() {
                document.querySelector('button').setAttribute('disabled', 'true');
            });
        });
    </script>
@endsection
