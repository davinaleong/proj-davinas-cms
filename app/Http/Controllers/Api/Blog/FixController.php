<?php

namespace App\Http\Controllers\Api\Blog;

use App\Models\Post;
use App\Models\ApiStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixController extends Controller
{
    public function postsFeatured(Request $request)
    {
        $request->validate([
            'featured' => 'required|boolean'
        ]);

        $updateCount = Post::where('name', '!=', '')
            ->update(['featured' => $request->input('featured')]);

        $data = [
            'status' => ApiStatus::$STATUS_FAILED,
            'message' => ApiStatus::$MESSAGE_POSTS_FEATURED_FAILED
        ];
        
        if ($updateCount) {
            $data = [
                'status' => ApiStatus::$STATUS_SUCCESS,
                'message' => ApiStatus::$MESSAGE_POSTS_FEATURED_SUCCESS
            ];
        }
        return response()->json($data);
    }

    public function postsYear()
    {
        $sql = "YEAR(`published_at`)";
        if (env('DB_CONNECTION') == 'pgsql') {
            $sql = "date_part('year', `published_at`)";
        }
        
        DB::statement("UPDATE `posts` SET `year` = $sql WHERE `user_id` = 1");

        $data = [
            'status' => ApiStatus::$STATUS_SUCCESS,
            'message' => ApiStatus::$MESSAGE_POSTS_FEATURED_SUCCESS
        ];
        return response()->json($data);
    }
}
