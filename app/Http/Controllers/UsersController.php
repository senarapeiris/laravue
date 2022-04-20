<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

  public function users()
  {
    $users = User::where('status', 1)->get();
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['name' => "Users"]
    ];
    return view('/content/users/users', [
      'breadcrumbs' => $breadcrumbs,
      'users' => $users
    ]);
  }


  public function create()
  {
    $roles = Role::get();
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Users"], ['name' => "Add User"]
    ];
    return view('/content/users/add-user', compact('roles'), [
      'breadcrumbs' => $breadcrumbs
    ]);
  }


  public function store(Request $request)
  {
    $validator = \Validator::make(
      $request->all(),
      [
        'name' => 'required|max:120',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
      ]
    );
    $user               =     new User();
    $user['name']       =     $request->name;
    $user['email']      =     $request->email;
    $user['password']   =     Hash::make($request->password);
    $user['role']    =     $request->role_id;

    $user->save();

    return redirect()->route('users')->with('success', 'User successfully added!!!');
  }


  // public function show($id)
  // {
  // $user = User::find($id);
  // return view('users.show',compact('user'));
  // }


  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::get();
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Users"], ['name' => "Edit User"]
    ];
    return view('/content/users/edit-user', compact('user', 'roles'), [
      'breadcrumbs' => $breadcrumbs
    ]);
  }


  public function update(Request $request)
  {
    $user = User::findOrFail($request->id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role_id;

    $user->update();

    return redirect()->route('users')->with('success', 'User successfully updated!!!');
  }


  public function destroy($id)
  {
    $user = User::find($id);
    $user->status = 0;

    $user->update();

    return redirect()->route('users')->with('success', 'User successfully deleted!!!');
  }
}
