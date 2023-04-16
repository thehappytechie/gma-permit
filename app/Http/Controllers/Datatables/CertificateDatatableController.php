<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CertificateDatatableController extends Controller
{
    public function certificateDatatable(Request $request)
    {
        if ($request->ajax()) {
            $certificates = Certificate::with('vessel')->select('certificates.*');
            return DataTables::of($certificates)
                ->addColumn('action', function ($certificate) {
                    return '<a class="btn btn--subtle btn--sm" href="certificate/' .
                        $certificate->id .
                        '/edit" title="Edit">
                        <svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </a> ';
                })
                ->editColumn('issue_date', function (Certificate $certificate) {
                    return Carbon::parse($certificate->issue_date)->format('Y M, d');
                })
                ->editColumn('expiry_date', function (Certificate $certificate) {
                    return Carbon::parse($certificate->expiry_date)->format('Y M, d');
                })
                ->addColumn('status', function ($certificate) {
                    if ($certificate->expiry_date <= Carbon::now()) {
                        return '<span class="badge badge--accent text-xs">expired</span>';
                    }
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
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('certificate.index');
    }
}
