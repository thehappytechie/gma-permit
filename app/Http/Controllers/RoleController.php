<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoleController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $data = $this->doValidation($request, $role);
        $role->fill($data);
        $role->save();
        $request->session()->flash('success', 'Role created successfully.');
        return redirect()->route('roleDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $data = $this->doValidation($request, $role);
        $role->update($data);
        $request->session()->flash('success', 'Role updated successfully.');
        return redirect()->route('roleDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        session()->flash('success', 'Role deleted successfully.');
        return redirect()->route('roleDatatable');
    }

    public function doValidation($request, $role)
    {
        return $request->validate(
            [
                'name' =>  [($role->id) ? "sometimes" : "required", Rule::unique(Role::class)->ignore($role->id)],
            ],
        );
    }
}
