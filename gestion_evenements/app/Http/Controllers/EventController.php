<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Models\categorie;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=Auth::user();

        // dd($user->events);
        $events = $user->events->where('validation','invalid');
        return view('Organisator.eventlist',compact('events'));
    }

    public function ValidDisplay(Request $request){
        // dd($request);
        $event=event::find($request->id);
        $event->validation='valid';
        $event->save();
        // dd($event);
        return redirect()->back();
    }
    public function diplayform(){
        $categories=categorie::all();
        // dd($categories);
        return view('Organisator.CreateEvent',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userid=Auth::id();
        // dd($request);
        $event=event::create([
            'titre'=>$request->name,
            'description'=>$request->discription,
            'event_date'=>$request->dateDepart,
            'event_fin'=>$request->datefin,
            'lieu'=>$request->lieu,
            'category_id'=>$request->Cat,
            'nombre_places'=>$request->numberofplaces,
            'user_id'=>$userid,
            'accept_mode'=>$request->type_paiement,
        ]);
        $event->save();
        return redirect()->route('Events'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // dd($request);
        // $events=event::all();
        // $categories=categorie::all();
        $categorie=categorie::find($request->cat);
        $events=$categorie->events;
        // dd($events);
        return view('events',compact('categorie','events'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        // dd($request);
        $event=event::find($request->id);
        $event->titre=$request->name;
        $event->description=$request->discription;
        $event->event_date=$request->dateDepart;
        $event->event_fin=$request->datefin;
        $event->lieu=$request->lieu;
        $event->category_id=$request->Cat;
        $event->nombre_places=$request->numberofplaces;
        $event->accept_mode=$request->type_paiement;
        $event->save();
        return redirect()->route('Events');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $event=event::find($request->id);
        // dd($event);
        $categories=categorie::all();
        // dd($categorie);
        return view('Organisator.updateEvent',compact('event','categories'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }


    public function search(){
        $serach = $_GET['query'];
        $events = event::where('titre','LIKE','%'.$serach.'%')->get();
        return view('user.search', compact('events'));
    }
}
