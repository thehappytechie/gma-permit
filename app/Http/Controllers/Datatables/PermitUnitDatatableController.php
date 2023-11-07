<?php

namespace App\Http\Controllers\Datatables;

use App\Models\PermitUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PermitUnitDatatableController extends Controller
{
    public function permitUnitDatatable(Request $request)
    {
        if ($request->ajax()) {
            $permitUnits = PermitUnit::select(['id', 'name']);
            return DataTables::of($permitUnits)
                ->addColumn('checkbox', '')
                ->addColumn('action', function ($permitUnit) {
                    return '<a class="btn btn--subtle btn--sm" href="permit-unit/' .
                        $permitUnit->id .
                        '/edit" title="View">
                    <svg width="12" height="12" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                         <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    </a>';
                })
                ->editColumn('name', function (PermitUnit $permitUnit) {
                    return '<a href="permit-unit/' . $permitUnit->id . '/edit">' . $permitUnit->name . '</a>';
                })
                ->rawColumns(['name', 'action', 'checkbox'])
                ->editColumn('id', 'ID: {{ $id }}')
                ->make(true);
        }
        return view('permit-unit.index');
    }
}
