<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id_user = Auth::user()->id;
        $cars = DB::table('cars')->where('user', $id_user)->get();
        $rides = Ride::where('user', $id_user)->latest()->get();
        $rides->load('school');
        return Inertia::render('Rides/Index', compact('rides', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id_user = Auth::user()->id;
        $schools = DB::table('schools')->get(['id', 'name']);
        $cars = DB::table('cars')->where('user', $id_user)->get();
        return Inertia::render('Rides/Create', compact('schools', 'cars'));
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
        $id_user = Auth::user()->id;
        $request->request->add(['user' => $id_user]);
        $request->validate([
            'number' => 'required',
            'session' => 'required',
        ]);
        $ride = Ride::create($request->only(
        'user',
        'number',
        'session',
        'sector',
        'school',
        'car',
        ));
        return redirect()->route('rides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        //
        $ride->load('user');
        $ride->load('car');
        $ride->load('school');
        return Inertia::render('Rides/Show', compact('ride'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        //
        $id_user = Auth::user()->id;
        $schools = DB::table('schools')->get(['id', 'name']);
        $cars = DB::table('cars')->where('user', $id_user)->get();
        return Inertia::render('Rides/Edit', compact('ride', 'schools', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        //
        $request->validate([
            'number' => 'required',
            'session' => 'required',
        ]);
        $ride->update($request->only(
        'user',
        'number',
        'session',
        'sector',
        'school',
        'car',
        ));
        return redirect()->route('rides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        //
        $ride->delete();
        return redirect()->route('rides.index');
    }
}
