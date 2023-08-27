<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::all();

        return view('admin.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request)
    {
        Admin::create($request->validated());

        return redirect()->route('admin')->with('success', 'Admin created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Admin::find($id);

        return view('admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $data = Admin::find($id);
        $data->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $data->password,
        ]);

        return redirect()->route('admin')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Admin::find($id);
        $data->delete();

        return redirect()->route('admin')->with('success', 'Admin deleted successfully.');
    }
}
