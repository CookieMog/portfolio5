<?php

use App\Http\Controllers\PageController;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

Route::get('/', [PageController::class, 'home'])->name('home');

// Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::controller(ImageController::class)->group(function () {
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});
/* Route::get('/login', [FortifyServiceProvider::class, 'login'])->name('login'); */



Route::get('/test', function () {
    var_dump('je suis lapge test');
});
Route::get('/projets', function () {
    var_dump('Page des projets');
});

Route::get('/moderation', function () {
    var_dump('section moderation admin');
});
Route::get('/gallery', [ProjectController::class, 'showProjectPublic'])->name('public-gallery');
Route::get('/project/{id}', [PageController::class, 'projectView'])->name('project');
Route::get('/add-comment/{id}', [PageController::class, 'addComment'])->name('comment');
Route::post('/store-comment', [CommentController::class, 'storeComment'])->name('storeComment');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [PageController::class, 'adminView'])->name('admin');
    Route::get('/gallery', [ProjectController::class, 'showProject'])->name('gallery');
    Route::get('/add-project', [PageController::class, 'admin_addProject'])->name('add-project');
    Route::post('/store-project', [ProjectController::class, 'storeProject'])->name('storeProject');
    Route::delete('/projet/{id}', [ProjectController::class, 'deleteProject'])->name('delete-project');
    Route::get('/edit-project/{id}', [PageController::class, 'admin_editProject'])->name('edit-project');
    Route::put('/update-project/{id}', [ProjectController::class, 'updateProject'])->name('update-project');
    Route::get('/moderate', [PageController::class, 'moderationView'])->name('moderate');
    Route::get('/moderate-comments', [PageController::class, 'moderateCommentView'])->name('moderateComment');
    Route::get('/moderate-comments/{id}', [CommentController::class, 'validateComment'])->name('validate');
    Route::get('/delete-comments/{id}', [CommentController::class, 'deleteComment'])->name('delete-comment');
    Route::delete('/projects/{id}/tags', [ProjectController::class, 'deleteTags'])->name('delete-tags');
});
