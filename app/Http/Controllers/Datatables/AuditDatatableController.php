<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use OwenIt\Auditing\Models\Audit;
use App\Http\Controllers\Controller;

class AuditDatatableController extends Controller
{
    public function audit(Request $request)
    {
        if ($request->ajax()) {
            $audits = Audit::with('user')->select('audits.*');
            return DataTables::of($audits)
                ->editColumn('user.name', function ($audit) {
                    return $audit->user->name ?? "";
                })
                ->editColumn('subject_type', function ($audit) {
                    return $audit->subject_type ?? "";
                })
                ->editColumn('log_name', function ($audit) {
                    return $audit->log_name ?? "";
                })
                ->editColumn('event', function ($audit) {
                    return '<span class="badge badge--warning-light text-xs">  ' . $audit->event . ' </span>';
                })
                ->editColumn('created_at', function ($audit) {
                    return Carbon::parse($audit->created_at)->format('j M, Y @ h:ia');
                })
                ->rawColumns(['event'])
                ->make(true);
        }
        return view('pages.audit');
    }
}
