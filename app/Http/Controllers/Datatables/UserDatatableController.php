<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class UserDatatableController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:superuser');
    }

    public function userDatatable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('users.*');
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                    <a class="btn btn--subtle btn--sm" href="users/' .
                        $user->id .
                        '/edit" title="Edit">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg> </a>
                        ';
                })
                ->addColumn('role', function (User $user) {
                    return $user->roles
                        ->map(function ($role) {
                            return ucfirst('<span class="badge badge--warning text-xs">' . $role->name . '</span>');
                        })
                        ->implode(', ');
                })
                ->editColumn('name', function (User $user) {
                    return '
                    <a href="users/' . $user->id . '/edit">' . $user->name . '</a>';
                })
                ->editColumn('last_login_at', function (User $user) {
                    if ($user->last_login_at == NULL) {
                        return '';
                    } else {
                        return Carbon::parse($user->last_login_at)->diffForHumans();
                    }
                })
                ->addColumn('checkbox', '')
                ->rawColumns(['name', 'action', 'role'])
                ->editColumn('id', 'ID: {{ $id }}')
                ->make(true);
        }
        return view('users.index');
    }

    public function trashedUserDatatable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::onlyTrashed()->select('users.*');
            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return '
                    <a class="btn btn--subtle btn--sm" href="users/restore/' .
                        $user->id .
                        '/" title="Restore">
                        <svg width="12" height="12" fill="#000"
                        viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                        </svg></a>

                        <a class="btn btn--subtle btn--sm" href="users/delete/' .
                        $user->id .
                        '/" title="Delete">
                        <svg width="12" height="12" fill="#000"
                        viewBox="0 0 16 16">
                              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg></a>
                        ';
                })
                ->addColumn('role', function (User $user) {
                    return $user->roles
                        ->map(function ($role) {
                            return ucfirst('<span class="badge badge--warning">' . $role->name . '</span>');
                        })
                        ->implode(', ');
                })
                ->editColumn('name', function (User $user) {
                    return '
                    <a href="users/' . $user->id . '/edit">' . $user->name . '</a>';
                })
                ->editColumn('deleted_at', function (User $user) {
                    if ($user->deleted_at == NULL) {
                        return '';
                    } else {
                        return Carbon::parse($user->deleted_at)->diffForHumans();
                    }
                })
                ->rawColumns(['name', 'action', 'role'])
                ->editColumn('id', 'ID: {{ $id }}')
                ->make(true);
        }
        return view('users.trashed');
    }
}
