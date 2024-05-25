@extends('layouts.main')

@section('content')
    @include('components.alert')

    <div class="bg-gray-100">
        <section
            class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex
                    items-center justify-center min-h-screen">
            <div class="h-full w-full absolute top-0 left-0 z-0">
                <img src="images/cover-bg1.jpg" alt="" class="h-full lg:h-auto lg:w-full object-cover opacity-20"
                    loading="lazy">
            </div>

            <div class="z-10 w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 bg-gray-800">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-2xl text-white">
                        Login to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.create') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">
                                Your email
                            </label>
                            <input type="email" name="email" id="email"
                                class="border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="name@company.com" required="" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">
                                Password
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required=""
                                class="@error('password') border-red-400 @enderror border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            @error('password')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="#" class="text-sm font-medium text-white hover:underline text-primary-500">
                                Forgot password?
                            </a>
                        </div>
                        <button type="submit"
                            class="inline-block w-full font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded disabled:text-gray-500 disabled:border-gray-500">
                            Login
                        </button>
                        <p class="text-sm font-light text-gray-400">
                            Don’t have an account yet?
                            <a href="{{route('register.index', null, true)}}" class="font-medium text-primary-600 hover:underline text-primary-500">
                                Register
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
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', function () {
          document.querySelector('button').setAttribute('disabled', 'true');
        });
      });
    </script>
@endsection
