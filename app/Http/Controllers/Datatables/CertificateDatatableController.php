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
                ->addColumn('checkbox', '')
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
                ->rawColumns(['status', 'checkbox'])
                ->make(true);
        }
        return view('certificate.index');
    }
}
