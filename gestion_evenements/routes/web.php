<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EventController;
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

Route::post('/categoryEvent',[EventController::class,'show'])->name('categoryEvent');
Route::post('/updateacess',[AdminController::class,'updateacess'])->middleware(['auth', 'role:admin'])->name('updateacess');
Route::get('/adminDashboard', function () {
    
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('adminDashboard');
Route::get('/Statistiques',[AdminController::class,'index'])->middleware(['auth', 'role:admin'])->name('Statistiques');
Route::get('/EventsList',[AdminController::class,'events'])->middleware(['auth', 'role:admin'])->name('EventsList');
Route::post('/validevent',[EventController::class,'ValidDisplay'])->middleware(['auth', 'role:admin'])->name('validevent');
Route::get('/UsersList',[AdminController::class,'users'])->middleware(['auth', 'role:admin'])->name('UsersList');
Route::get('/Events',[EventController::class,'index'])->middleware(['auth', 'role:organisator'])->name('Events');
Route::get('/dashboardOrganisator', function () {
    return view('Organisator.index');
})->middleware(['auth', 'verified'])->name('dashboardOrganisator');
Route::get('/CreateEvent',[EventController::class,'diplayform'])->middleware(['auth', 'role:organisator'])->name('CreateEvent');
Route::post('/UpdateEvent',[EventController::class,'update'])->middleware(['auth', 'role:organisator'])->name('UpdateEvent');
Route::post('/Updateev',[EventController::class,'edit'])->middleware(['auth', 'role:organisator'])->name('Updateev');
Route::post('/AjoutEvent',[EventController::class,'store'])->middleware(['auth', 'role:organisator'])->name('AjoutEvent');
Route::post('/createCat',[CategorieController::class,'store'])->middleware(['auth', 'role:admin'])->name('createCat');
Route::get('/addCategory',[CategorieController::class,'add'])->middleware(['auth', 'role:admin'])->name('addCategory');
Route::post('/UpdateCategory',[AdminController::class,'updatecat'])->middleware(['auth', 'role:admin'])->name('UpdateCategory');
Route::post('/UpdateCat',[CategorieController::class,'updatecat'])->middleware(['auth', 'role:admin'])->name('UpdateCat');
Route::get('/Category',[AdminController::class,'categories'])->middleware(['auth', 'role:admin'])->name('Category');
Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboardAdmin');


Route::delete('/deleteCategory',[CategorieController::class,'destroy'] )->middleware(['auth', 'role:admin'])->name('deleteCategory');

Route::get('/search',[EventController::class,'search'] );




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
