<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostFavoriteController extends Controller
{
    public function store(Post $post, Request $request) {

        if($post->isAlreadyLiked($request->user())){
            return response(null, 409);         
        }
       
        $post->favorites()->create([
            'user_id' => $request->user()->id 
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request) {
       
        $request->user()->favorites()->where('post_id', $post->id)->delete();

        return back();
    }
}
