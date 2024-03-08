<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\admin;
use App\Models\User;
use App\Models\categorie;
use App\Models\event;
use App\Models\reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $event=event::count();
        $categorie=categorie::count();
        $reservation=reservation::count();
        $users = User::whereHas('roles', function($query) {
            $query->whereIn('name', ['user', 'organisator']);
        })->count();
        return view('admin.index',compact('event','categorie','users','reservation'));
    }
    public function users(){
        $users = User::whereHas('roles', function($query) {
            $query->whereIn('name', ['user', 'organisator']);
        })->get();
    
        return view('admin.Userslist', compact('users'));
    }
    public function categories(){
        $categories = categorie::all();
        return view('admin.Category',compact('categories'));
    }
    public function events(){
        $events = event::all();
        return view('admin.eventlist', compact('events'));
    }

    public function updatecat(Request $request){
        $categorie=categorie::find($request->id);
        // dd($categorie);
        return view('admin.updatCategorie',compact('categorie'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function updateacess(Request $request)
    {
        // dd($request);
        $user=User::find($request->id);
        // dd($user);
        $user->acess=$request->acess;
        $user->save();
        return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
