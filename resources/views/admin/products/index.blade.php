@extends('admin.layouts.main')

@section('content')
    <div class="sm:rounded-lg max-w-7xl w-full">
        {{-- button create product --}}
        <div class="flex justify-start my-5">
            <a href="{{ route('admin.products.create') }}"
                class="font-medium text-gray-200 py-2 px-4 hover:no-underline rounded-md bg-gray-800 hover:bg-gray-950">
                Create Product
            </a>
        </div>

    </div>
@endsection
