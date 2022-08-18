<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use DB;

class ApiController extends Controller
{
    //
    public function users(){
        $users = User::with('posts:id,user_id,title,body')->get();
        return response()->json($users);
    }
    public function postsTop(){
        $topPosts =  Post::select('id', 'body', 'title', DB::raw('MAX(rating) as rating'))->groupBy('user_id')->get();
        return response()->json($topPosts);   
    }
    public function postId($id){
        $post = Post::with('user:id,name')->findOrFail($id);
            return response()->json($post);   
    }
}
