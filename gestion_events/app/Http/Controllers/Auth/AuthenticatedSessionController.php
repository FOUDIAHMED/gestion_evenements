<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth()->user();
        // dd($user->acess);

        if ($user->hasRole('admin')) {
            // return view('admin.dashboard');
            return redirect()->route('adminDashboard');

           } elseif ($user->hasRole('organisator')) {
            if($user->acess==="valid") {
                return redirect()->route('dashboardOrganisator')->with("flash_message" , "Welcome  $user->name") ;
            }else{
                return redirect()->route('auth.login');
            }

           

        }else {
            if($user->hasRole('user')){
                if($user->acess==="valid"){
                    return redirect()->route('home')->with("flash_message" , "Welcome  $user->name") ;
                }
                else{
                    return redirect()->route('login');
                }
            }
            
        }
        return redirect('/');


        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
