<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $data = [];
        $users = User::paginate(10);
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
                'user' => $user,
                'users' => $users,
                'tasks' => $tasks,
        ];
        $data += $this->counts($user);
       
      
        if ((\Auth::user()->id) == $user->id) {
            return view('users.show', $data);
       } else{
            return view('welcome',compact('user', 'tasks'));
        }
    }
    
}