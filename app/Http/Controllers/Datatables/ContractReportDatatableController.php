<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use App\Models\Contract;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ContractReportDatatableController extends Controller
{
    public function contractReportDatatable(Request $request)
    {
        if ($request->ajax()) {
            $contracts = Contract::with(['company', 'category'])->select('contracts.*');
            return DataTables::of($contracts)
                ->editColumn('title', function (Contract $contract) {
                    return '<a href="' . $contract->hash_id . '/edit">' . $contract->title . '</a>';
                })
                ->editColumn('status', function (Contract $contract) {
                    if ($contract->status == 'active') {
                        return '<span class="badge badge--success text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'pending') {
                        return '<span class="badge badge--contrast-higher text-xs">' . $contract->status . '</span>';
                    } else {
                        return '<span class="badge badge--warning text-xs">' . $contract->status . '</span>';
                    };
                })
                ->editColumn('start_date', function (Contract $contract) {
                    return  Carbon::parse($contract->start_date)->format('d M, Y');
                })
                ->editColumn('expiry_date', function (Contract $contract) {
                    return  Carbon::parse($contract->expiry_date)->format('d M, Y');
                })
                ->filter(function ($query) use ($request) {
                    if ($request->issueFrom) {
                        $issueFrom = Carbon::parse($request->get('issueFrom'));
                        if ($request->has('issueTo')) {
                            $issueTo = Carbon::parse($request->get('issueTo'));
                            $query->whereBetween('start_date', [$issueFrom, $issueTo]);
                        } else {
                            $query->whereDate('start_date', $issueFrom);
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
                ->editColumn('status', function (Contract $contract) {
                    if ($contract->status == 'active') {
                        return '<span class="badge badge--success text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'archived') {
                        return '<span class="badge badge--warning text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'draft') {
                        return '<span class="badge badge text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'pending') {
                        return '<span class="badge badge--contrast-higher text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'expired') {
                        return '<span class="badge badge--accent text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'terminated') {
                        return '<span class="badge badge--error-light text-xs">' . $contract->status . '</span>';
                    } elseif ($contract->status == 'superseded') {
                        return '<span class="badge badge--primary text-xs">' . $contract->status . '</span>';
                    } else {
                        return '<span class="badge badge--warning text-xs">' . $contract->status . '</span>';
                    };
                })
                ->rawColumns(['name', 'action', 'title', 'status'])
                ->editColumn('hash_id', 'ID: {{ $hash_id }}')
                ->make(true);
        }
        return view('contract.reports');
    }
}
