<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function fetchPosts()
    {
        $this->postService->fetchPosts();

        return response()->json(['message' => 'Post data fetched and stored successfully.'], 200);
    }
}
