@extends('layouts.main')

@section('content')
    @include('components.alert')

    <div class="bg-gray-100">
        <section
            class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex
                    items-center justify-center min-h-screen">
            <div class="h-full w-full absolute top-0 left-0 z-0">
                <img src="/images/cover-bg1.jpg" alt="" class="h-full lg:h-auto lg:w-full object-cover opacity-20"
                    loading="lazy">
            </div>

            <div class="z-10 w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 bg-gray-800">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-3xl text-white">
                        Verify your email
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('verification.send', null, true) }}"
                        method="post">
                        @csrf
                        <div class="max-w-xl px-5 text-center">
                            <h2 class="mb-2 text-xl font-bold text-white">Please Check your inbox</h2>
                            <p class="mb-2 text-lg text-zinc-400">We are glad, that you’re with us ? We’ve sent you a
                                verification link to the email address <span
                                    class="font-medium text-indigo-500">{{ auth()->user()->email }}</span>.</p>
                        </div>
                        <button type="submit"
                            class="inline-block w-full font-semibold px-4 py-2 text-white bg-blue-600 md:bg-transparent md:text-white border border-white rounded disabled:text-gray-500 disabled:border-gray-500">
                            Resend email
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
