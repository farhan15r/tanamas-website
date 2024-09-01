@extends('admin.layouts.main')

@section('content')
    <div class="sm:rounded-lg max-w-7xl w-full mb-14 h-fit">
        {{-- button create product --}}
        <div class="flex justify-start my-5">
            <a href="{{ route('admin.products.create') }}"
                class="font-medium text-gray-200 py-2 px-4 hover:no-underline rounded-md bg-gray-800 hover:bg-gray-950">
                Create Product
            </a>
        </div>

        <table class="shadow-2xl w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Item Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->item_no }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-M-Y H:i:s', strtotime($product->created_at)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-M-Y H:i:s', strtotime($product->updated_at)) }}
                        </td>
                        <td class="px-6 py-4 gap-2 flex w-full">
                            <a href="#"
                                class="font-medium text-white px-2 py-1 hover:no-underline rounded-md bg-blue-600 dark:bg-blue-500 hover:bg-blue-700 w-1/2 text-center">
                                Edit
                            </a>
                            <form action="{{route('admin.products.destroy', $product->id)}}" class="flex w-1/2" method="POST" onsubmit="return confirm('Sure To Delete This Product?\n{{ $product->name }}')">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="font-medium text-white px-2 py-1 hover:no-underline rounded-md bg-red-600 dark:bg-red-500 hover:bg-red-700 hover:cursor-pointer">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
