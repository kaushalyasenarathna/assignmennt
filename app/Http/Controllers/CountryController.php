<?php

namespace App\Http\Controllers;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

public $searchTeam;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(Request $request)
    {

        
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $country = Country::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('country_code', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('country.index', compact('country'));
           //    return view('vehicle.index');
        //    $country = Country::get();
        //    // dd($country);
        //    return view('country.index')->with(compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country_code' => 'required',
            
            ]);
            Country::create($request->all());
            return redirect()->route('country.index')->with('add','Record Added' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country) 

    {
       
        return view('country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->update($request->all());
        return redirect()->route('country.index')->with('add','Record edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
       
        $country->delete();
        return redirect()->route('country.index')->with('add','Record Delete');
        //
    }
    public function render()
    {
        $searchTeam='%'.$this->searchTeam.'%';
        $country=Country::where('name','LIKE',$searchTeam )
        ->orwhere('country_code','LIKE',$searchTeam )
        ->orderBy('id','DESC')->get();

        return view('country.index',['country'=>$country]);
    }
}
