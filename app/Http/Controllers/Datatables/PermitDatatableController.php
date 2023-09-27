<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use App\Models\Permit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PermitDatatableController extends Controller
{
    public function permitDatatable(Request $request)
    {
        if ($request->ajax()) {
            $permits = Permit::with(['company', 'permitUnit'])->select('permits.*');
            return DataTables::of($permits)
                ->addColumn('action', function ($permit) {
                    return '<a class="btn btn--subtle btn--sm" href="permit/' .
                        $permit->id .
                        '/edit" title="Edit">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </a> ';
                })
                ->addColumn('checkbox', '')
                ->editColumn('status', function ($permit) {
                    if ($permit->expiry_date <= Carbon::now()) {
                        return '<span class="badge badge--accent text-xs">expired</span>';
                    }
                })
                ->editColumn('issue_date', function (Permit $permit) {
                    return Carbon::parse($permit->issue_date)->format('d M Y');
                })
                ->editColumn('expiry_date', function (Permit $permit) {
                    return Carbon::parse($permit->expiry_date)->format('d M Y');
                })
                ->filter(function ($query) use ($request) {
                    if ($request->issueFrom) {
                        $issueFrom = Carbon::parse($request->get('issueFrom'));
                        if ($request->has('issueTo')) {
                            $issueTo = Carbon::parse($request->get('issueTo'));
                            $query->whereBetween('issue_date', [$issueFrom, $issueTo]);
                        } else {
                            $query->whereDate('issue_date', $issueFrom);
                        }
                    }
                    if ($request->expireFrom) {
                        $expireFrom = Carbon::parse($request->get('expireFrom'));
                        if ($request->has('expireTo')) {
                            $expireTo = Carbon::parse($request->get('expireTo'));
                            $query->whereBetween('expiry_date', [$expireFrom, $expireTo]);
                        } else {
                            $query->whereDate('expiry_date', $expireFrom);
                        }
                    }
                })
                ->rawColumns(['action', 'status', 'checkbox'])
                ->make(true);
        }
        return view('permit.index');
    }

    public function safetyPermitDatatable(Request $request)
    {
        if ($request->ajax()) {
            $permits = Permit::with(['company', 'permitUnit'])->where('permit_type', '=', 'safety permit')->select('permits.*');
            return DataTables::of($permits)
                ->addColumn('checkbox', '')
                ->editColumn('status', function ($permit) {
                    if ($permit->expiry_date <= Carbon::now()) {
                        return '<span class="badge badge--accent text-xs">expired</span>';
                    }
                })
                ->editColumn('issue_date', function (Permit $permit) {
                    return Carbon::parse($permit->issue_date)->format('d M Y');
                })
                ->editColumn('expiry_date', function (Permit $permit) {
                    return Carbon::parse($permit->expiry_date)->format('d M Y');
                })
                ->filter(function ($query) use ($request) {
                    if ($request->issueFrom) {
                        $issueFrom = Carbon::parse($request->get('issueFrom'));
                        if ($request->has('issueTo')) {
                            $issueTo = Carbon::parse($request->get('issueTo'));
                            $query->whereBetween('issue_date', [$issueFrom, $issueTo]);
                        } else {
                            $query->whereDate('issue_date', $issueFrom);
                        }
                    }
                    if ($request->expireFrom) {
                        $expireFrom = Carbon::parse($request->get('expireFrom'));
                        if ($request->has('expireTo')) {
                            $expireTo = Carbon::parse($request->get('expireTo'));
                            $query->whereBetween('expiry_date', [$expireFrom, $expireTo]);
                        } else {
                            $query->whereDate('expiry_date', $expireFrom);
                        }
                    }
                })
                ->rawColumns(['action', 'status', 'checkbox'])
                ->make(true);
        }
        return view('permit.safety');
    }

    public function operatingPermitDatatable(Request $request)
    {
        if ($request->ajax()) {
            $permits = Permit::with(['company', 'permitUnit'])->where('permit_type', '=', 'operating permit')->select('permits.*');
            return DataTables::of($permits)
                ->addColumn('checkbox', '')
                ->editColumn('status', function ($permit) {
                    if ($permit->expiry_date <= Carbon::now()) {
                        return '<span class="badge badge--accent text-xs">expired</span>';
                    }
                })
                ->editColumn('issue_date', function (Permit $permit) {
                    return Carbon::parse($permit->issue_date)->format('d M Y');
                })
                ->editColumn('expiry_date', function (Permit $permit) {
                    return Carbon::parse($permit->expiry_date)->format('d M Y');
                })
                ->filter(function ($query) use ($request) {
                    if ($request->issueFrom) {
                        $issueFrom = Carbon::parse($request->get('issueFrom'));
                        if ($request->has('issueTo')) {
                            $issueTo = Carbon::parse($request->get('issueTo'));
                            $query->whereBetween('issue_date', [$issueFrom, $issueTo]);
                        } else {
                            $query->whereDate('issue_date', $issueFrom);
                        }
                    }
                    if ($request->expireFrom) {
                        $expireFrom = Carbon::parse($request->get('expireFrom'));
                        if ($request->has('expireTo')) {
                            $expireTo = Carbon::parse($request->get('expireTo'));
                            $query->whereBetween('expiry_date', [$expireFrom, $expireTo]);
                        } else {
                            $query->whereDate('expiry_date', $expireFrom);
                        }
                    }
                })
                ->rawColumns(['action', 'status', 'checkbox'])
                ->make(true);
        }
        return view('permit.operating');
    }

    public function editPermitDatatable(Request $request)
    {
        if ($request->ajax()) {
            $permits = Permit::with(['company', 'permitUnit'])->select('permits.*');
            return DataTables::of($permits)
                ->addColumn('action', function ($permit) {
                    return '<a class="btn btn--subtle btn--sm" href="permit/' .
                        $permit->id .
                        '/edit" title="Edit">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </a> ';
                })
                ->addColumn('checkbox', '')
                ->editColumn('status', function ($permit) {
                    return '<a class="btn btn--primary btn--sm" href="permit/' . $permit->id . '/edit " title="View">
                    Edit
                    </a>';
                })
                ->editColumn('issue_date', function (Permit $permit) {
                    return Carbon::parse($permit->issue_date)->format('d M Y');
                })
                ->editColumn('expiry_date', function (Permit $permit) {
                    return Carbon::parse($permit->expiry_date)->format('d M Y');
                })
                ->filter(function ($query) use ($request) {
                    if ($request->issueFrom) {
                        $issueFrom = Carbon::parse($request->get('issueFrom'));
                        if ($request->has('issueTo')) {
                            $issueTo = Carbon::parse($request->get('issueTo'));
                            $query->whereBetween('issue_date', [$issueFrom, $issueTo]);
                        } else {
                            $query->whereDate('issue_date', $issueFrom);
                        }
                    }
                    if ($request->expireFrom) {
                        $expireFrom = Carbon::parse($request->get('expireFrom'));
                        if ($request->has('expireTo')) {
                            $expireTo = Carbon::parse($request->get('expireTo'));
                            $query->whereBetween('expiry_date', [$expireFrom, $expireTo]);
                        } else {
                            $query->whereDate('expiry_date', $expireFrom);
                        }
                    }
                })
                ->rawColumns(['action', 'status', 'checkbox'])
                ->make(true);
        }
        return view('permit.manage-permit');
    }
}
