@extends('admin.layouts.main')

@section('content')
    <div class="sm:rounded-lg max-w-7xl w-full">
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
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Veryfied At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Login
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->company }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->roles->pluck('name')->join(', ') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ date('d-M-Y', strtotime($user->email_verified_at)) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->last_login ? date('d-M-Y H:i:s', strtotime($user->last_login)) : __('Never' )}}
                        </td>
                        <td class="px-6 py-4 gap-1 flex">
                            <a href="#" class="font-medium text-white p-1 hover:no-underline rounded-md bg-blue-600 dark:bg-blue-500 hover:bg-blue-700">
                              Edit
                            </a>
                            <a href="#" class="font-medium text-white p-1 hover:no-underline rounded-md bg-blue-600 dark:bg-blue-500 hover:bg-blue-700">
                              Remove
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
