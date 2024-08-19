<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

Class PostService{

    public function fetchPosts()
    {
        $url = 'https://dummyjson.com/posts';
        $response = Http::get($url);

        if ($response->successful()) {
            $responseData = $response->json();
            $posts = $responseData['posts'] ?? [];

            foreach ($posts as $post) {
                if (isset($post['id'])) {
                    Post::updateOrCreate(
                        ['id' => $post['id']],
                        [
                            'title' => $post['title'] ?? '',
                            'body' => $post['body'] ?? '',
                            'tags' => $post['tags'] ?? [],
                            'reactions' => $post['reactions'] ?? [],
                            'views' => $post['views'] ?? 0,
                            'user_id' => $post['userId'] ?? 0, 
                        ]
                    );
                }
            }

            return response()->json(['error' => 'Error fetching posts: ' . $response->status()], $response->status());
        }
    }
}
?>
