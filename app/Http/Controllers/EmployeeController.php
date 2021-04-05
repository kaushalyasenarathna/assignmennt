<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->toArray();

        return array_reverse($employees);
    }

    public function store(Request $request)
    {
        $employee = new Employee([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);
        $employee->save();

        return response()->json('Employee created!');
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return response()->json($employee);
    }

    public function update($id, Request $request)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());

        return response()->json('Employee updated!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json('Employee deleted!');
    }
}
