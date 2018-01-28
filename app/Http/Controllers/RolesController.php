<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) { // only admin can see roles list
            $roles = Role::all(); 
            return view('roles.index', compact('roles'));
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
        if (Auth::user()->role_id == 1) { // only admin can create role
            return view('roles.create');
        }
        // if not admin redirecting home
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role_id == 1) { // only admin can create role
            $role = Role::create([
                'name' => $request->input('role_name')
            ]);

            if ($role) {
                // if stored successfully return with success message
                return redirect()->route('roles.index')->with('success', 'Role has been created.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role_id == 1) { // only admin can edit role
            $role = Role::find($id);
            return view('roles.edit', compact('role'));
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
        if (Auth::user()->role_id == 1) {  // only admin can update role
            $updateRole = Role::where('id', $id)
                ->update([
                    'name' => $request->input('role_name')
                ]);
            if ($updateRole) {
                // if updated successfully return with success message
                return redirect()->route('roles.index')->with('success', 'Role has been updated successfully.');
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
        if (Auth::user()->role_id == 1) {  // only admin can delete role
            $deleteRole = Role::find($id)->delete();
            if ($deleteRole) {
                // if deleted successfully return with success message
                return redirect()->route('roles.index')->with('success', 'Role has been deleted succesfully.');
            }
            return back()->with('error', 'Role could not be deleted');
        }
    }
}
