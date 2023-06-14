<?php

namespace App\Http\Controllers\Datatables;

use App\Models\Vessel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class VesselDatatableController extends Controller
{
    public function vesselDatatable(Request $request)
    {
        if ($request->ajax()) {
            $vessels = Vessel::select('vessels.*');
            return DataTables::of($vessels)
                ->addColumn('checkbox', '')
                ->addColumn('action', function ($vessel) {
                    return '<a class="btn btn--subtle btn--sm" href="vessels/' . $vessel->id . ' " title="View">
                    <svg width="12" height="12" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                         <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                        </a> ';
                })
                ->rawColumns(['action', 'checkbox'])
                ->make(true);
        }
        return view('vessels.index');
    }
}
