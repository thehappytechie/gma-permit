<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\UserEdit;
use App\Http\Requests\UserCreate;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:superuser|admin-access');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::get(['id', 'name']);
        $roles = Role::all();
        return view('users.create', compact(['roles', 'permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreate $request, User $user)
    {
        $user = new User;
        $data = $request->validated();
        $user->fill($data);
        $user->assignRole($request->roles);
        $user->syncPermissions($request->permissions);
        $user->save();

        $request->session()->flash('success', 'User created successfully.');
        return redirect()->route('userDatatable');
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
        $permissions = Permission::get(['id', 'name']);
        $user = User::findOrFail($id);
        $roles = Role::get(['id', 'name']);
        return view('users.edit', compact(['user', 'roles', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEdit $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();
        $user->permissions()->sync($request->permissions);
        $user->roles()->sync($request->role);
        $user->update($data);
        $request->session()->flash('success', 'User updated successfully.');
        return redirect()->route('userDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('error', 'User trashed successfully.');
        return redirect()->route('userDatatable');
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        session()->flash('success', 'User restored successfully.');
        return redirect()->route('userDatatable');
    }

    public function delete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        session()->flash('error', 'User deleted successfully.');
        return redirect()->route('userDatatable');
    }

    public function restoreAll()
    {
        User::onlyTrashed()->restore();
        session()->flash('success', 'Users restored successfully.');
        return redirect()->route('userDatatable');
    }
}
