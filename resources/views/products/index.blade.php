@extends('layouts.main')

@section('content')
    @include('components.alert')

    <div class="bg-gray-100">
        <section
            class="cover bg-blue-teal-gradient relative bg-blue-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex
                    items-center justify-center min-h-screen flex-col gap-5">

            <div class="h-full w-full absolute top-0 left-0 z-0">
                <img src="images/cover-bg1.jpg" alt="" class="h-full lg:h-auto lg:w-full object-cover opacity-20 fixed"
                    loading="lazy">
            </div>


            <div class="z-10 w-full grid grid-cols-2 gap-8">
                @foreach ($products as $product)
                    <div>
                        <div
                            class="relative flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full max-w-[48rem] h-48 flex-row">
                            <div
                                class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none bg-clip-border rounded-xl justify-center flex">
                                <img src="{{ $product->images[0]->path }}" alt="card-image"
                                    class="object-cover h-full" />
                            </div>
                            <div class="p-4 flex flex-col gap-2">
                              <h6
                                  class="block font-sans text-xs antialiased leading-relaxed tracking-normal text-white uppercase bg-gray-500 w-fit px-2 rounded-md">
                                  {{ $product->category->name }}
                              </h6>
                                <h4
                                    class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                    {{ $product->name }}
                                </h4>
                                <h6
                                    class="block font-sans text-sm antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
                                    Item No: {{ $product->item_no }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $products->links() }}

        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.title = 'Products | Tanamas Industry Comunitas';
    </script>
@endsection
