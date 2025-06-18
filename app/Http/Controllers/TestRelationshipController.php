<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class TestRelationshipController extends Controller
{
    /**
     * Get all posts of a specific country (hasManyThrough)
     */
    public function countryPosts($countryId)
    {
        $country = Country::with('posts')->findOrFail($countryId);
        return response()->json($country->posts);
    }

    /**
     * Get all comments with user and commentable (Post or Video)
     */
    public function allComments()
    {
        $comments = Comment::with(['user', 'commentable'])->get();
        return response()->json($comments);
    }

    /**
     * Get all posts with their tags
     */
    public function allPostsWithTags()
    {
        $posts = Post::with('tags')->get();
        return response()->json($posts);
    }

    /**
     * Get all videos with their tags
     */
    public function allVideosWithTags()
    {
        $videos = Video::with('tags')->get();
        return response()->json($videos);
    }
}
