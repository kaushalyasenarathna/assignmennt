<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;

class StateController extends Controller
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
        // $state = State::query()
        //     ->where('name', 'LIKE', "%{$search}%")
        //     ->orWhere('country', 'LIKE', "%{$search}%")
        //     ->get();
    
        // Return the search view with the resluts compacted
  

            //    $state = DB::table('states')
            //    ->join('countries', 'states.country', '=','countries.id')
            //    ->select('states.*', 'countries.name')
            //   ->get();     
         
              $state = State::select(
                "states.id", 
                "states.name",
                 
                "countries.name as country"
            )
            ->join("countries", "countries.id", "=", "states.country")
            ->get();

        // $state = State::get();
        // $country = Country::get();
       
        // print_r($state);
        return view('state.index', compact('state'));
        // return view('state.index')->with(compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(State $state, Country $country)
    {
        $state = State::get();
        $country = Country::get();

        return view('state.create')->with(compact('state', 'country'));
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
            'country' => 'required',
            ]);

        $country = Country::find($request->get('country'));
        State::create($request->all());

        return redirect()->route('state.index')->with('add', 'Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state, Country $country)
    {
        $country = Country::get();
        return view('state.edit', compact('state','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $state->update($request->all());

        return redirect()->route('state.index')->with('add', 'Record edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        
        $state->delete();

        return redirect()->route('state.index')->with('add', 'Record Delete');
    }
}
