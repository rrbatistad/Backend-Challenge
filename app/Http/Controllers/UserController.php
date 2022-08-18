<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use GuzzleHttp\Client ;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::orderBy('updated_at', 'desc')
               ->paginate(20);
        return view('users.index', ['users' => $users]);
    }
    public function edit($id){
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function importUsers()
    {
        $client = new Client(); 
        $url = "https://jsonplaceholder.typicode.com/users";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
   
        foreach($responseBody as $user){
            $post = Post::where('user_id', $user->id)->first();
           
          
            if($post && $post->user_id == $user->id){

                $userdb = User::find($user->id);
                if($userdb && $userdb->email !=''){
                    
                }else{
                    $nuser = new User();
                    $nuser->id =$user->id;
                    $nuser->name =$user->name;
                    $nuser->email = $user->email;
                    $nuser->city = $user->address->city;
                    $nuser->password = Hash::make($user->username);
                    $nuser->save(); 
                }
            }
        }
        return redirect()->route('users.index')
						 ->with(['message'=>'Usuarios actualizados correctamente']);
    }
}