<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use Illuminate\Support\Facades\Auth;


class SystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::all();
        return view('systems.index',compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id < 3) { // only admin and moderator can create systems
            return view('systems.create');
        }
        // if not admin or moderator redirecting home
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can store systems to database
            $system = System::create([
                'name' => $request->input('system_name'),
                'description' => $request->input('description')
            ]);

            if ($system) {
                // if stored successfully return with success message
                return redirect()->route('systems.index')->with('success', 'System has been created.');
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
        $system = System::find($id);
        $services = $system->services;
        return view('systems.show', compact('system', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role_id < 3) { // only admin and moderator can edit systems
            $system = System::find($id);
            return view('systems.edit', compact('system'));
        }
        // if not admin or moderator redirecting home
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can update systems
            $systemUpdate = System::where('id', $id)
                ->update([
                    'name' => $request->input('system_name'),
                    'description' => $request->input('description')
                ]);

            if ($systemUpdate) {
                // if updated successfully return with success message
                return redirect()->route('systems.show', compact('id'))->with('success', 'System info has been updated.');
            }
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can delete systems
            $deleteSystem = System::where('id', $id)->delete();
            if ($deleteSystem) {
                // if deleted successfully return with success message
                return redirect()->route('systems.index')->with('success', 'System has been deleted succesfully.');
            }
            return back()->with('error', 'System could not be deleted');
        }
    }
}
