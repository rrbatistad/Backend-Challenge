<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client ;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy('updated_at', 'desc')
        ->simplePaginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    public function edit($id){
        $post = Post::find($id);

        return view('posts.edit', ['post' => $post]);
    }

    public function importPosts()
    {
        $client = new Client(); 
        $url = "https://jsonplaceholder.typicode.com/posts";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
   
        for ($i = 0; $i < 50; $i++) {
            $ptitle =0; $pbody=0;$rating=0;
            $ptitle =  2 * str_word_count($responseBody[$i]->title);
            $pbody =  str_word_count($responseBody[$i]->body);
            $rating = $ptitle + $pbody; 
            $npost = new Post();
            $post = Post::find($responseBody[$i]->id);
            if($post && $post->id == $responseBody[$i]->id){
                $npost->body = $responseBody[$i]->body;
                $npost->update();
            }else{
                $npost->id = $responseBody[$i]->id;
                $npost->title = $responseBody[$i]->title;
                $npost->body = $responseBody[$i]->body;
                $npost->user_id = $responseBody[$i]->userId;
                $npost->rating = $rating;
                $npost->save(); 
            }
        
    }
    return redirect()->route('posts.index')
						 ->with(['message'=>'Posts actualizados correctamente']);
    }

}