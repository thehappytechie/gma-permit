<?php

namespace App\Http\Controllers\Datatables;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Contract;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CompanyDatatableController extends Controller
{
    public function companyDatatable(Request $request)
    {
        if ($request->ajax()) {
            $companies = Company::select(['id', 'name', 'email', 'contact']);
            return DataTables::of($companies)
                ->addColumn('action', function ($company) {
                    return '<a class="btn btn--subtle btn--sm" href="company/' . $company->id . ' " title="View">
                    <svg width="12" height="12" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                         <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    </a>';
                })
                ->addColumn('checkbox', '')
                ->editColumn('name', function (Company $company) {
                    return  '<a href="company/' . $company->id . '/edit">' . $company->name . '</a>';
                })
                ->rawColumns(['name', 'action', 'checkbox'])
                ->editColumn('id', 'ID: {{ $id }}')
                ->make(true);
        }
        return view('company.index');
    }
}
