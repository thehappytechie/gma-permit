<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Upload;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class DatatableController extends Controller
{
    public function dashboardReportDatatable(Request $request)
    {
        if ($request->ajax()) {
            $reports = Upload::where('agent_id', '=', Auth::user()->agent->id)->get();
            return DataTables::of($reports)
                ->editColumn('name', function (Upload $report) {
                    return $report->user->name;
                })
                ->editColumn('created_at', function (Upload $report) {
                    return Carbon::parse($report->created_at)->format('d M, Y');
                })
                ->editColumn('agent', function (Upload $report) {
                    return $report->agent->name;
                })
                ->make(true);
        }
        return view('pages.dashboard');
    }
}
