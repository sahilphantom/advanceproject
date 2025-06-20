<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestRelationshipController;
use App\Http\Controllers\XSSDemoController;

Route::get('/country/{id}/posts', [TestRelationshipController::class, 'countryPosts']);
Route::get('/comments', [TestRelationshipController::class, 'allComments']);
Route::get('/posts/tags', [TestRelationshipController::class, 'allPostsWithTags']);
Route::get('/videos/tags', [TestRelationshipController::class, 'allVideosWithTags']);

Route::get('/xss-demo', [XSSDemoController::class, 'show']);



