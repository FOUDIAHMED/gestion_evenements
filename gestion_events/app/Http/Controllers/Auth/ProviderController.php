<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProviderController extends Controller
{
    //
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        try{
            $SocialUser=Socialite::driver($provider)->user();
            if(User::where('email',$SocialUser->email)->exists()){
                if(User::where('provider',$provider)->exists()){
                    $user=User::where(
                        [
                            'provider'=>$provider,
                            'provider_id'=>$SocialUser->id,
        
                        ]
                    )->first();
                    Auth::login($user);
                    return redirect('/dashboard');
                }
                return redirect('login')->withErrors(['email'=>'this email is uses diferent method to login']);
            }
            $user=User::where(
                [
                    'provider'=>$provider,
                    'provider_id'=>$SocialUser->id,

                ]
            )->first();
            if(!$user){
                $user=User::create([
                    'name'=>$SocialUser->name,
                    'email'=>$SocialUser->email,
                    'username'=>User::generateUserName($SocialUser->nickname),
                    'provider'=>$provider,
                    'provider_id'=>$SocialUser->id,
                    'provider_token' => $SocialUser->token,
                    'email_verified_at'=>now(),
                    'picture'=>$SocialUser->avatar
                ]);
                $user->assignRole('user');
                $user->save();
            }
            Auth::login($user);
            return redirect('/dashboard');
        }catch(Exception $e){
            return redirect('/login');

        }
        // $SocialUser=Socialite::driver($provider)->user();
        
        // dd($SocialUser);
        // $user = User::updateOrCreate([
        //     'provider_id' => $SocialUser->id,
        //     'provider'=>$provider,
        // ], [
        //     'name' => $SocialUser->name,
        //     'email' => $SocialUser->email,
        //     'username'=>$SocialUser->nickname,
        //     'provider_token' => $SocialUser->token,
        // ]);
     
        // Auth::login($user);
        // return redirect('/dashboard');

    }
}
