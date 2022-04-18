<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Setting;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::orderByDesc('created_at')
                ->paginate(Setting::getListPerPage()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'user_name' => Auth::user()->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'text' => 'required|string',
            'featured' => 'nullable|int',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'published_at' => 'required|date|dateFormat:Y-m-d',
        ]);

        $featured = $request->input('featured') ? true : false;

        $name = $request->input('name');
        $text = $request->input('text');

        $post = Post::create([
            'user_id' => Auth::id(),
            'name' => $name,
            'slug' => Post::generateSlug($name),
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'summary' => Post::generateSummary($text),
            'text' => $text,
            'featured' => $featured,
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'published_at' => $request->input('published_at'),
        ]);

        if ($featured) {
            Post::whereNot('id', $post->id)->update(['featured' => false]);
        }

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Post ' . $post->name . ' created.',
            'label' => 'View Post',
            'link' => route('posts.show', ['post' => $post])
        ]);

        return redirect(route('posts.show', ['post' => $post]))
            ->with('message', 'Post created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'text' => 'required|string',
            'featured' => 'nullable|int',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'published_at' => 'required|date|dateFormat:Y-m-d',
        ]);

        $featured = $request->input('featured') ? true : false;

        $name = $request->input('name');
        $text = $request->input('text');

        $post->user_id = Auth::id();
        $post->name = $name;
        $post->slug = Post::generateSlug($name);
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->summary = Post::generateSummary($text);
        $post->text = $text;
        $post->featured = $featured;
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->published_at = $request->input('published_at');
        $post->save();

        if ($featured) {
            Post::whereNot('id', $post->id)->update(['featured' => false]);
        }

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Post ' . $post->name . ' modified.',
            'label' => 'View Post',
            'link' => route('posts.show', ['post' => $post])
        ]);

        return redirect(route('posts.show', ['post' => $post]))
            ->with('message', 'Post modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post_name = $post->name;
        $post->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'message' => 'Post ' . $post_name . ' deleted.'
        ]);

        return redirect(route('posts.index'))
            ->with('message', 'Post deleted.');
    }
}
