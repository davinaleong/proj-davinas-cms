<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\ApiStatus;

class BlogController extends Controller
{
    public function index()
    {
        $commonData = $this->common('index', 6);
        $featuredPost = Post::where('featured', true)->first();

        $data = ['featured' => $featuredPost];
        $data = array_merge($data, $commonData);

        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData) && filled($featuredPost)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge($data, $this->statusArray($status, $message));

        return response()->json($data);
    }

    public function about()
    {
        $commonData = $this->common('about', 1);
        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge($commonData, $this->statusArray($status, $message));
        return response()->json($data);
    }

    public function archiveFolder()
    {
        $commonData = $this->common('archive', 1);
        $featuredPost = Post::where('featured', true)
            ->first();
        $folders = Folder::whereRaw('LENGTH(`name`) <= 4')->orderByDesc('name')
            ->get();

        $data = [
            'featured' => $featuredPost,
            'folders' => $folders
        ];

        $data = array_merge($data, $commonData);

        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData) && filled($featuredPost) && filled($folders)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge($data, $this->statusArray($status, $message));
        return response()->json($data);
    }

    public function archiveList(string $year)
    {
        $commonData = $this->common('archive', 1);
        $featuredPost = Post::where('featured', true)
            ->first();
        $folders = Folder::whereRaw("LOWER(name) LIKE LOWER('%$year%')")
            ->take(1)
            ->get();
        $posts = [];
        if ($folders->count() > 0) {
            $posts = Post::where('folder_id', $folders[0]->id)
                ->paginate(20);
        }

        $data = [
            'featured' => $featuredPost,
            'folders' => $folders,
            'posts' => $posts
        ];
        $data = array_merge($data, $commonData);

        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData) && filled($featuredPost) && filled($folders) && filled($posts)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge($data, $this->statusArray($status, $message));
        return response()->json($data);
    }

    public function posts(string $slug)
    {
        $commonData = $this->common('post', 1);
        $posts = [];

        if ($slug) {
            $posts = Post::where('slug', $slug)->take(1)->get();
        }

        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData['latest']) && filled($posts)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge([
            'latest' => $commonData['latest'],
            'posts' => $posts
        ], $this->statusArray($status, $message));
        return response()->json($data);
    }

    public function contact()
    {
        $commonData = $this->common('contact', 1);
        $status = ApiStatus::$STATUS_FAILED;
        $message = ApiStatus::$MESSAGE_GET_DATA_FAILED;

        if (filled($commonData)) {
            $status = ApiStatus::$STATUS_SUCCESS;
            $message = ApiStatus::$MESSAGE_GET_DATA_SUCCESS;
        }

        $data = array_merge($commonData, $this->statusArray($status, $message));
        return $data;
    }

    private function common($pageName, $latestCount)
    {
        $pageData = Page::whereRaw("LOWER(name) LIKE LOWER('%$pageName%')")->first();
        $latestPosts = Post::orderByDesc('published_at')
            ->take($latestCount)
            ->get();

        return [
            'page' => $pageData,
            'latest' => $latestPosts
        ];
    }

    private function statusArray($status, $message)
    {
        return [
            'status' => $status,
            'message' => $message,
        ];
    }
}
