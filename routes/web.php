<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestRelationshipController;
use App\Http\Controllers\XSSDemoController;
use App\Livewire\UserSearch;

// Route::get('/country/{id}/posts', [TestRelationshipController::class, 'countryPosts']);
// Route::get('/comments', [TestRelationshipController::class, 'allComments']);
// Route::get('/posts/tags', [TestRelationshipController::class, 'allPostsWithTags']);
// Route::get('/videos/tags', [TestRelationshipController::class, 'allVideosWithTags']);

// Route::get('/xss-demo', [XSSDemoController::class, 'show']);

// Route::get('/users', [FormController::class, 'usersPage'])->name('form.users.page');
// Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');
// Route::get('/form-users', [FormController::class, 'allUsers'])->name('form.users');
// Route::get('/form-users/{id}', [FormController::class, 'getUser'])->name('form.user');
// Route::put('/form-users/{id}', [FormController::class, 'update'])->name('form.user.update');

Route::get('/hello', function () {
    return view('hello');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-search', function () {
    return view('user'); // or 'user-search' if you rename the file
});


