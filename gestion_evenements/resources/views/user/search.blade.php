<!-- Userslist.blade.php -->

@extends('layouts.app')

@section('content')
    
@forelse($events as $event)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$event->titre}}</h5>
            <p class="card-text">{{$event->description}}</p>
            <p class="card-text">{{$event->event_date}}</p>
            <p class="card-text">{{$event->event_fin}}</p>
            <p class="card-text">{{$event->lieu}}</p>
            <p class="card-text">{{$event->nombre_places}}</p>
            <p class="card-text">{{$event->organisator_id}}</p>
        </div>
    </div>
    @empty
    <p>No events found</p>
    @endforelse

@endsection
