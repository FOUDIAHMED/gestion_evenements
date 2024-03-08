<!-- Userslist.blade.php -->

@extends('layouts.app')

@section('content')
    
<div class="container">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Categorie name
                </th>
                
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $user)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->name}}
                </th>
                
                <td class="px-6 py-4">
                    <form action="/UpdateCategory" method="post">
                        @csrf
                        <button type="submit" name="id"  value="{{$user->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">edit</button>
                    </form>
                    <form action="/deleteCategory" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="id" value="{{$user->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
                    </form>
                    <!-- <a href="{{route('UpdateCategory')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a> -->
                </td>
                <!-- <td class="px-6 py-4">
                    
                </td> -->

            </tr>
            @endforeach
            
        </tbody>
    </table>
    
</div>
<a href="{{route('addCategory')}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">ajouter Category</a>
</div>

@endsection
