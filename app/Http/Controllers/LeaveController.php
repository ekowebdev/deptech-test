<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Leave::all();

        return view('leave.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        return view('leave.create', ['employee' => $employee]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveRequest $request)
    {
        $count = Leave::where('employee_id', $request->employee_id)->count();
        if($count >= 5) {
            return redirect()->route('leave')->with('error', 'Only 5 maximum leave.');
        }

        Leave::create($request->validated());

        return redirect()->route('leave')->with('success', 'Leave created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Leave::find($id);
        $employee = Employee::all();

        return view('leave.edit', ['data' => $data, 'employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveRequest $request, $id)
    {
        $data = Leave::find($id);
        $data->update($request->validated());

        return redirect()->route('leave')->with('success', 'Leave updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Leave::find($id);
        $data->delete();

        return redirect()->route('leave')->with('success', 'Leave deleted successfully.');
    }
}
