<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentCreate;
use App\Http\Requests\DepartmentEdit;
use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:superuser', ['only' => ['create', 'store', 'edit', 'update', 'show',]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departmentDatatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::get(['id', 'name']);
        return view('department.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentCreate $request)
    {
        $department = new Department();
        $data = $request->validated();
        $department->fill($data);
        $department->save();
        $request->session()->flash('success', 'Department created successfully.');
        return redirect()->route('departmentDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $locations = Location::get();
        return view('department.edit', compact(['department', 'locations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentEdit $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);
        $request->session()->flash('success', 'Department updated successfully.');
        return redirect()->route('departmentDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
