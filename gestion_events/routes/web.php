<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

route::get('home',[HomeController::class,'index']);

 
Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect'] );
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback'] );

 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
 
//     // $user->token
// });


Route::post('/updateacess',[AdminController::class,'updateacess'])->middleware(['auth', 'role:admin'])->name('updateacess');
Route::get('/adminDashboard', function () {
    // Notification::send(User::all(),new \App\Notifications\UpdateMenuNotification());
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('adminDashboard');
Route::get('/Statistiques', function () {
    // Notification::send(User::all(),new \App\Notifications\UpdateMenuNotification());
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('Statistiques');
Route::get('/EventsList', function () {
    // Notification::send(User::all(),new \App\Notifications\UpdateMenuNotification());
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('EventsList');
Route::get('/UsersList',[AdminController::class,'users'])->middleware(['auth', 'role:admin'])->name('UsersList');
Route::get('/dashboardOrganisator', function () {
    // Notification::send(User::all(),new \App\Notifications\UpdateMenuNotification());
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardOrganisator');
Route::post('/addCategory',[CategorieController::class,'store'])->middleware(['auth', 'role:admin'])->name('addCategory');
Route::post('/Category',[CategorieController::class,'index'])->middleware(['auth', 'role:admin'])->name('Category');
Route::get('/dashboardAdmin', function () {
    // Notification::send(User::all(),new \App\Notifications\UpdateMenuNotification());
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboardAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
