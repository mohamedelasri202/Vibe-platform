<?php

use App\Models\listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;

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
    return view('listings');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// show regester form 
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user 
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);


// show login form 
Route::get('/login', [UserController::class, 'login']);



Route::post('/User/authenticate', [UserController::class, 'authenticate']);
// show the profil

//  edite submit to update the user detaills 
// get the view for the edite form 
Route::get('/edite', [UserController::class, 'edite']);
Route::get('/profilo', [UserController::class, 'profilo'])->name('profilo.profilo');
Route::Put('/profilo/{user}', [UserController::class, 'update'])->name('profilo.update');

// loading users view  
Route::get('/friends', [UserController::class, 'friends']);


// require __DIR__ . '/auth.php';
