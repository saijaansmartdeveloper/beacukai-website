<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $postQuery = Post::query();
        $postQuery->where('title_post', 'like', '%'.$request->get('q').'%');
        $postQuery->orderBy('title_post');
        $posts = $postQuery->paginate(25);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Post);

        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $newPost = $request->validate([
            'title_post'        => 'required|max:60',
            'content_post'      => 'nullable',
        ]);

        if ($request->hasFile('image_post')) {
            $filename               = time() . '.' . $request->image_post->extension();
            $newPost['image_post']  = $request->image_post->storeAs('posts', $filename, 'public');
        }

        $newPost['slug']       = Str::slug($request->title_post);
        $newPost['creator_id'] = auth()->id();

        $post = Post::create($newPost);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $postData = $request->validate([
            'title_post'        => 'required|max:60',
            'content_post'      => 'nullable',
        ]);

        if ($request->hasFile('image_post')) {
            @unlink('storage/' . $post->image_post);
            $filename               = time() . '.' . $request->image_post->extension();
            $postData['image_post']  = $request->image_post->storeAs('posts', $filename, 'public');
        }

        $postData['slug']       = Str::slug($request->title_post);

        $post->update($postData);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $request->validate(['post_id' => 'required']);

        @unlink('storage/' . $post->image_post);

        if ($request->get('post_id') == $post->id && $post->delete()) {
            return redirect()->route('posts.index');
        }

        return back();
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('single', $post);
    }
}
