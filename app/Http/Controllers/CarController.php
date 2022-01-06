<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Cars/Create');
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
            'brand' => 'required',
            'mob' => 'required',
        ]);
        $car = Car::create($request->only(
        'user',
        'brand',
        'mob',
        'year',
        'company',
        'image',
        ));
        if($request->file('image')){
            $car->image = $request->file('image')->store('cars', 'public');
            $car->save();
        }
        return redirect()->route('cars.edit', $car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
        $car->load('user');
        return Inertia::render('Cars/Show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
        return Inertia::render('Cars/Edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
        $request->validate([
            'brand' => 'required',
            'mob' => 'required',
        ]);
        $car->update($request->only(
        'brand',
        'mob',
        'year',
        'company',
        'image',
        ));
        if($request->file('image')){
            $car->image = $request->file('image')->store('cars', 'public');
            $car->save();
        }
        return redirect()->route('rides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();
        return redirect()->route('rides.index');
    }
}
