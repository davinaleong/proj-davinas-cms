<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = $this->common("Index", 6);
        $featured_post = Post::where('featured', true)->first();
        $data = array_merge($data, ['featured' => $featured_post]);
        return $data;
    }

    public function about()
    {
        return $this->common("About", 1);
    }

    public function archiveFolder()
    {
        $featured_post = Post::where('featured', true)
            ->first();
        $folders = Folder::orderByDesc('name')
            ->get();

        $data = [
            'featured' => $featured_post,
            'folders' => $folders
        ];

        $common_data = $this->common('Archive', 1);
        $data = array_merge($data, $common_data);
        return $data;
    }

    public function archiveList(string $year)
    {
        $common_data = $this->common('archive', 1);

        $featured_post = Post::where('featured', true)
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
            'featured' => $featured_post,
            'folders' => $folders,
            'posts' => $posts
        ];
        $data = array_merge($data, $common_data);

        return $data;
    }

    public function posts(string $slug)
    {
        $common_data = $this->common("Post", 1);
        $posts = [];

        if ($slug) {
            $posts = Post::where('slug', $slug)->take(1)->get();
        }

        return [
            'latest' => $common_data['latest'],
            'posts' => $posts
        ];
    }

    public function contact()
    {
        return $this->common("Contact", 1);
    }

    private function common($page_name, $latest_count)
    {
        $page_data = Page::whereRaw("LOWER(name) LIKE LOWER('%$page_name%')")->first();
        $latest_posts = Post::orderByDesc('published_at')
            ->take($latest_count)
            ->get();

        return [
            'page' => $page_data,
            'latest' => $latest_posts
        ];
    }
}
