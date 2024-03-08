<!-- Userslist.blade.php -->

@extends('layouts.app')

@section('content')
    
<div class="container">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Event Name
                </th>
                <th scope="col" class="px-6 py-3">
                   Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Depart
                </th>
                <th scope="col" class="px-6 py-3">
                    Date de fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Validation
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$event->titre}}
                </th>
                <td class="px-6 py-4">
                    {{$event->description}}
                </td>
                <td class="px-6 py-4">
                {{$event->event_date}}
                </td>
                <td class="px-6 py-4">
                {{$event->event_fin}}
                </td>
                <td class="px-6 py-4">
                {{$event->validation}}
                </td>
                
                <td class="px-6 py-4">
                    <form action="/validevent" method="post">
                        @csrf
                        <button type="submit" name="id" value="{{$event->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </form>
                    <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit acess</a> -->
                </td>
            </tr>
            @empty
            <h3>no event found</h3>
            @endforelse
        </tbody>
    </table>
</div>
<a href="{{route('CreateEvent')}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">ajouter Event</a>
</div>

@endsection
