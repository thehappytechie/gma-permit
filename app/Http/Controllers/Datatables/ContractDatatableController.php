<?php

namespace App\Http\Controllers\Datatables;

use App\Models\Contract;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ContractDatatableController extends Controller
{
    public function contractDatatable(Request $request)
    {
        if ($request->ajax()) {
            $contracts = Contract::with(['company', 'category'])->select('contracts.*');
            return DataTables::of($contracts)
                ->addColumn('action', function ($contract) {
                    return '<a class="btn btn--subtle btn--sm" href="' .
                        $contract->hash_id .
                        '/edit" title="Edit">
                    <svg width="12" height="12" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                    </a> ';
                })
                ->editColumn('title', function (Contract $contract) {
                    return '<a href="' . $contract->hash_id . '/edit">' . $contract->title . '</a>';
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
                ->filterColumn('company.name', function ($query, $keyword) {
                    $sql = "CONCAT(users.first_name,'-',users.last_name)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->rawColumns(['name', 'action', 'title', 'status'])
                ->editColumn('hash_id', 'ID: {{ $hash_id }}')
                ->make(true);
        }
        return view('contract.index');
    }

    public function contractEditDatatable(Request $request)
    {
        if ($request->ajax()) {
            $contracts = Contract::select('contracts.*')
                ->join('companies', 'companies.id', '=', 'contracts.company_id')
                ->where('companies.id', '=', 'contracts.company_id')
                ->get();
            return DataTables::of($contracts)
                ->addColumn('action', function ($contract) {
                    return '<a class="btn btn--subtle btn--sm" href="' .
                        $contract->hash_id .
                        '/edit" title="Edit">
                    <svg width="12" height="12" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                    </a> ';
                })
                ->editColumn('company', function (Contract $contract) {
                    return $contract->company->name;
                })
                ->editColumn('category', function (Contract $contract) {
                    return $contract->category->name;
                })
                ->editColumn('company', function (Contract $contract) {
                    return $contract->company->name;
                })
                ->editColumn('title', function (Contract $contract) {
                    return '<a href="' . $contract->hash_id . '/edit">' . $contract->title . '</a>';
                })
                ->rawColumns(['name', 'action', 'title', 'status'])
                ->editColumn('hash_id', 'ID: {{ $hash_id }}')
                ->make(true);
        }
        return view('contract.edit');
    }
}
