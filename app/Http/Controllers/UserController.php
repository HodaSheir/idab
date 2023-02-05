<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(UserRequest $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/user');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserEditRequest $request , $id){
        $user = User::findOrFail($id);
        $input = $request->all();
        $input['password'] = $input['password'] ? Hash::make($input['password']): $user['password'];
        $user->update($input);
        Session::flash('success', 'User was sucessfully edited');
        return redirect()->route('user.index') ;
    }

    public function destroy($id){
        $delete_user = User::find($id) ;
        $delete_user->delete() ;
        Session::flash('success', 'User was deleted') ;
        return redirect()->back();
    }

    public function changeRole($id){
        $user = User::find($id);
        $user->manager = $user->manager ? 0 : 1;
        $user->save() ;
        return redirect()->back() ;
    }
}
