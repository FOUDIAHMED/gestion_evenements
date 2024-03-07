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
        // $events = event::all();
        return view('Organisator.eventlist');
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
        $event=event::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'event_date'=>$request->event_date,
            'event_fin'=>$request->event_fin,
            'lieu'=>$request->lieu,
            'category_id'=>$request->category_id,
            'nombre_places'=>$request->nombre_places,
            'organisator_id'=>$userid,
        ]);
        return redirect()->back();
        // dd($user);
        // $table->string('titre');
        //     $table->text('description');
        //     $table->date('event_date');
        //     $table->string('lieu');
        //     $table->foreignId('category_id')->constrained()->onDelete('cascade');
        //     $table->integer('nombre_places');
        //     $table->enum('validation',['valid','invalid'])->default('invalid');
        //     $table->timestamps();
        // $event
        // dd(Auth->user);
        // dd($request);
        // $event=event::create([
        //     'nom'=>$request->nom,
        //     'description'=>$request->description,
        //     'date'=>$request->date,
        //     'lieu'=>$request->lieu,
        //     'categorie_id'=>$request->categorie_id
        // ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeventRequest $request, event $event)
    {
        //
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
