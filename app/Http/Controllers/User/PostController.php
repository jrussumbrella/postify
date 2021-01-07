<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private function validatePost($request) {
        return $request->validate([
            'title' => 'required|min:6|max:100',
            'description' => 'required|min:6|max:500',
        ]);
    }

    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('user.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post) {
        return view('user.posts.show', ['post' => $post]);
    }

    public function create() {
        return view('user.posts.create');
    }

    public function store(Request $request) {
       $this->validatePost($request);
       $post = auth()->user()->posts()->create($request->only('title', 'description'));
       return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function edit(Post $post) {
        $this->authorize('view', $post);
        return view('user.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request) {
        $this->authorize('update', $post);
        $this->validatePost($request);
        $post->update($request->only('title', 'description'));
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
