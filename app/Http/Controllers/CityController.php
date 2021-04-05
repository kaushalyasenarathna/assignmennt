<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $search = $request->input('search');

        // // Search in the title and body columns from the posts table
        // $city = City::query()
        //     ->where('name', 'LIKE', "%{$search}%")

        //     ->get();

        $city = City::select(
            'cities.id',
            'cities.name',

            'states.name as state'
        )
        ->join('states', 'states.id', '=', 'cities.state')
        ->get();
        // dd($R);
        return view('city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city, State $state)
    {
        $state = State::get();
        $city = City::get();

        return view('city.create')->with(compact('state', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            ]);

        $state = State::find($request->get('state'));
        City::create($request->all());

        return redirect()->route('city.index')->with('add', 'Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, State $state)
    {
        $state = State::get();

        return view('city.edit', compact('state', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('city.index')->with('add', 'Record edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('city.index')->with('add', 'Record Delete');
    }
}
