<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UpdateMenuNotification;

class userController extends Controller
{
    //
    public function contact($property,$request){
        $user=User::first();
        $user->notify(new UpdateMenuNotification());
        return back()->with('success','Votre demande de contact a bien ete envoye');
    }
}
