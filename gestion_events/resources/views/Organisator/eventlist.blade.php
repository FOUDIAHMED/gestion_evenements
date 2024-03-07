<!-- Userslist.blade.php -->

@extends('layouts.app')

@section('content')
    
<div class="container">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User name
                </th>
                <th scope="col" class="px-6 py-3">
                   email
                </th>
                <th scope="col" class="px-6 py-3">
                    Acess
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    
                </th>
                <td class="px-6 py-4">
                    
                </td>
                <td class="px-6 py-4">
                    
                </td>
                
                <td class="px-6 py-4">
                    <!-- <form action="/updateacess" method="post">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="acess" value="valid">
                        <button type="submit"  value="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </form> -->
                    <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit acess</a> -->
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
<a href="{{route('CreateEvent')}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">ajouter Category</a>
</div>

@endsection
