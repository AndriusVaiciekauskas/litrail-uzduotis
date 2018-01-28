<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) { // only admin can see users list
            $users = User::all();
            return view('users.index', compact('users'));
        }
        // if not admin redirecting home
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role_id == 1) { // only admin can see user profile
            $user = User::find($id);
            $role = $user->role->name;
            return view('users.show', compact('user', 'role'));
        }
        // if not admin redirecting home
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role_id == 1) { // only admin can edit user profile
            $user = User::find($id);
            $roles = Role::all();
            return view('users.edit', compact('user', 'roles'));
        }
        // if not admin redirecting home
        return view('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role_id == 1) { // only admin can update user profile
            $updateUser = User::where('id', $id)
                ->update([
                    'name' => $request->input('username'),
                    'email' => $request->input('email'),
                    'role_id' => $request->input('role'),
                ]);
            if ($updateUser) {
                // if updated successfully return with success message
                return redirect()->route('users.show', ['id' => $id])->with('success', 'User profile has been updated successfuly.');
            }
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role_id == 1) { //only admin can delete user
            $deleteUser = User::find($id)->delete();
            if ($deleteUser) {
                // if deleted successfully return with success message
                return redirect()->route('users.index')->with('success', 'User has been deleted succesfully.');
            }
            return back()->with('error', 'User could not be deleted');
        }
    }
}
