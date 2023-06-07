<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Imports\CompanyImport;
use App\Http\Requests\CompanyEdit;
use App\Http\Requests\CompanyCreate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\File;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:superuser|editor', ['only' => ['create', 'store', 'edit', 'update', 'show',]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreate $request)
    {
        $company = new Company();
        $data = $request->validated();
        $company->fill($data);
        $company->save();
        $request->session()->flash('success', 'Company created successfully.');
        return redirect()->route('companyDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->load('permits');
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyEdit $request, Company $company)
    {
        $data = $request->validated();
        $company->update($data);
        $request->session()->flash('success', 'Company updated successfully.');
        return redirect()->route('companyDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function importCompany(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                File::types(['csv'])->max(12 * 1024),
            ],
        ]);
        Excel::import(new CompanyImport, request()->file('file'));
        $request->session()->flash('success', 'Companies imported successfully');
        return redirect()->route('companyDatatable');
    }
}
