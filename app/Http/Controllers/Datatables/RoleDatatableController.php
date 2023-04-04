<?php

namespace App\Http\Controllers\Datatables;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class RoleDatatableController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superuser']);
    }

    public function roleDatatable(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::select(['id', 'name', 'guard_name']);
            return DataTables::of($roles)
                ->editColumn('name', function (Role $role) {
                    return '<a href="roles/' . $role->id . '/edit">' . ucfirst($role->name) . '</a>';
                })
                ->addColumn('action', function ($role) {
                    return '<a class="btn btn--subtle btn--sm" href="roles/' .
                        $role->id .
                        '/edit" title="Edit">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </a> ';
                })
                ->rawColumns(['name', 'action'])
                ->editColumn('id', 'ID: {{ $id }}')
                ->make(true);
        }
        return view('roles.index');
    }
}
