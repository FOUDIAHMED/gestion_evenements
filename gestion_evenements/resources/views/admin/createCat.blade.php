@extends('layouts.app')
@section('content')
<form action="/createCat" method="post">
                        @csrf
                        <input type="text" name="cat">
                        <button type="submit"   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
</form>
@endsection