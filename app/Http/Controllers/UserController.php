<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function index()
    {
    //usersテーブルからname,email,roleを$usersに格納
    $users=User::all();
      
    //viewを返す(compactでviewに$usersを渡す)
    return view('user.index', compact('users'));
    }

    public function edit($id)
    {
        $users=User::find($id);
 
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id, User $users){
        $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|max:50'
            ]
        ,[
        'name.required' => 'nameは必須です。',
        'name.max' => '名前は50文字までです。',
        'email.required' => 'emailは必須です。',
        'email.email' => 'emailはemail形式です。',
        'email.max' => 'emailは50文字までです。',
        'email.max' => 'emailは50文字までです。',
        ]);
    
        $users = User::find($id);
        $users->email= $request->email;
        $users->name = $request->name;
        $users->role = $request->role;
        $users->save();
        return redirect()->route('user.index', ['id' => $users->id]);
        }
}