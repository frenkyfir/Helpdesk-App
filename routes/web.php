<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsermanagementController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/fetchtickets', [TicketController::class, 'fetchtickets'])->name('fetchtickets');
Route::get('/fetchdetailticket/{id}', [TicketController::class, 'fetchDetailTicket'])->name('fetchDetailTicket');


Route::get('/ticket', [TicketController::class, 'index'])->middleware(['auth', 'verified'])->name('ticket');
Route::post('/createticket', [TicketController::class, 'store'])->name('createticket');
Route::put('/updateticket/{id}', [TicketController::class, 'update'])->middleware(['auth', 'verified'])->name('updateticket');
Route::get('/detailticket/{id}', [TicketController::class, 'show'])->middleware(['auth', 'verified'])->name('showticket');
Route::delete('/deleteticket/{id}', [TicketController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteticket');
Route::get('/detailticket/{id}/comment', [TicketController::class, 'getTicketComments'])->name('getTicketComments');
Route::delete('/deleteticketcomment/{id}', [TicketController::class, 'deleteTicketComment'])->name('deleteTicketComment');




Route::get('/comment/{id}', [CommentController::class, 'show'])->name('comment');
Route::post('/createcomment', [CommentController::class, 'store'])->name('createcomment');
Route::post('/deletecomment/{id}', [CommentController::class, 'destroy'])->name('deletecomment');


Route::get('/overviewprofile', [UserProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('overviewprofile');


Route::get('/usermanagement', [UsermanagementController::class, 'index'])->middleware(['auth', 'verified'])->name('usermanagement');
Route::get('/adduser', [UsermanagementController::class, 'create'])->middleware(['auth', 'verified'])->name('adduser');
Route::post('/postuser', [UsermanagementController::class, 'store'])->middleware(['auth', 'verified'])->name('postuser');
Route::get('/deleteuser/{id}', [UsermanagementController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteuser');


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });








Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
