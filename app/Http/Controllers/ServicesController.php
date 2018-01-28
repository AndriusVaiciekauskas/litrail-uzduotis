<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\System;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getting parent services
        $services = Service::where('parent_id', 1)->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id < 3) { // only admin and moderator can create service
            // getting parent services for select list
            $parents = Service::whereIn('parent_id', [0, 1])->get(); 
            // getting all systems for select list
            $systems = System::all();
            return view('services.create', compact('parents', 'systems'));
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can create service
            $service = Service::create([
                'service_name' => $request->input('service_name'),
                'description' => $request->input('description'),
                'parent_id' => $request->input('parent'),
                'system_id' => $request->input('system')
            ]);

            if ($service) {
                // if stored successfully return with success message
                return redirect()->route('services.index')->with('success', 'Service has been created.');
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
        $service = Service::where('service_id', $id)->first();
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role_id < 3) { // only admin and moderator can edit services
            $service = Service::where('service_id', $id)->first();
            // getting services parents for select options
            $parents = Service::whereIn('parent_id', [0, 1])->get();
            $systems = System::all();
            return view('services.edit', compact('service', 'parents', 'systems'));
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can update services
            $updateService = Service::where('service_id', $id)
                ->update([
                    'service_name' => $request->input('service_name'),
                    'description' => $request->input('description'),
                    'parent_id' => $request->input('parent'),
                    'system_id' => $request->input('system')
                ]);
            if ($updateService) {
                // if updated successfully return with success message
                return redirect()->route('services.show', ['service_id' => $id])->with('success', 'Service has been updated successfully.');
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
        if (Auth::user()->role_id < 3) { // only admin and moderator can delete services
            $deleteService = Service::where('service_id', $id)->delete();
            if ($deleteService) {
                // if deleted successfully return with success message
                return redirect()->route('services.index')->with('success', 'Service has been deleted succesfully.');
            }
            return back()->with('error', 'Service could not be deleted');
        }
    }
}
