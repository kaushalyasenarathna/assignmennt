<?php

namespace App\Http\Controllers;

use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdata = Userdata::get();

        return view('userdata.index')->with(compact('userdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('userdata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);

        Userdata::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->name,
            'lastname' => $request->name, ]);

        return redirect()->route('user')->with('add', 'Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Userdata $userdata)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdata $userdata)
    {
        return view('userdata.edit', compact('userdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userdata $userdata)
    {
        $userdata->update($request->all());

        return redirect()->route('userdata.index')->with('add', 'Record edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userdata $userdata)
    {
        $userdata->delete();

        return redirect()->route('userdata.index')->with('add', 'Record Delete');
    }
}
