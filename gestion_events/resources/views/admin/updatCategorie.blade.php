@extends('layouts.app')
@section('content')
<form action="/UpdateCat" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$categorie->id}}">
                        <input type="text" name="cat" value="{{$categorie->name}}">
                        <button type="submit"  value="{{$categorie->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
</form>
@endsection