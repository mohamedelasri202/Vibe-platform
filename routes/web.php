<?php

use App\Models\User;
use App\Models\Friend;
use App\Models\listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\likeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use PHPUnit\Framework\Attributes\PostCondition;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::get('/edite', [UserController::class, 'edite'])->name('edite-profile');

Route::get('/profilo', [UserController::class, 'profilo'])->name('profilo.profilo');
Route::Put('/edite/{user}', [UserController::class, 'update']);



// loading users view  
Route::get('/friends', [UserController::class, 'friends']);



Route::middleware('auth')->group(function () {
    Route::post('/friends/request/{receiverId}', [FriendController::class, 'sendRequest'])->name('friends.request');
    Route::post('/friends/accept/{requestId}', [FriendController::class, 'acceptRequest'])->name('friends.accept');
    Route::post('/friends/decline/{requestId}', [FriendController::class, 'declineRequest'])->name('decline-request');
});

// load the view for the friend request pages 
Route::get('/friend_requests', [FriendController::class, 'friendRequests'])->name('friend_requests');
// load the view for the friends list 
Route::get('/friends_list', [FriendController::class, 'friendsList'])->name('frinds_list');
// load the view for the profile of another user 
Route::get('/profile/{userId}', [FriendController::class, 'profile'])->name('profileview');


Route::delete('/friend_requests/{id}/remove', [FriendController::class, 'declineRequest'])
    ->name('decline-request');
//  the route for submiting the form 

Route::post('/post', [PostController::class, 'store'])->name('post.add');

// get the posts from database 

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
// load the edite form 
Route::put('/editepost/{post}', [PostController::class, 'update'])->name('edite-post');

// the route for the delete a certain post 

Route::delete('/deletepost/{post}', [PostController::class, 'destroy'])->name('delete-post');

// route for the likes 

Route::post('/like/{post}', [likeController::class, 'addliek'])->name('likeadd');

// route for the comments 

Route::post('/comments/{post}', [CommentController::class, 'store'])->name('add-comment');

// route for the show comment 
Route::get('/comments/{post}', [CommentController::class, 'index'])->name('show-comment');



// Route::get('/profile/{userId}', [FriendController::class, 'profile'])->name('profile.view');


// require __DIR__ . '/auth.php';
