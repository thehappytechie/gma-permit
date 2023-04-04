<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class LoginAttemptController extends Controller
{
    public function loginAttempt(Request $request)
    {
        if ($request->ajax()) {
            $users = DB::table('authentication_log')->get();
            return DataTables::of($users)
                ->editColumn('login_at', function ($user) {
                    return Carbon::parse($user->login_at)->format('j M, Y @ h:ia');
                })
                ->editColumn('name', function ($user) {
                    return auth()->user()->name;
                })
                ->editColumn('login_successful', function ($user) {
                    if ($user->login_successful == 1) {
                        return
                            '<span class="badge badge--success-light text-xs">success</span>';
                    } else {
                        return
                            '<span class="badge badge--error-light text-xs">failed</span>';
                    }
                })
                ->rawColumns(['login_successful'])
                ->make(true);
        }
        return view('pages.login-attempt');
    }
}
