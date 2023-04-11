<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermitCreate;
use App\Models\Permit;
use App\Models\Company;
use App\Models\PermitUnit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permitUnits = PermitUnit::get(['id', 'name']);
        $companies = Company::get(['id', 'name']);
        return view('permit.create', compact('companies', 'permitUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermitCreate $request)
    {
        $permit = new Permit();
        $data = $request->validated();
        $permit->fill($data);
        $permit->save();
        $request->session()->flash('success', 'Permit created successfully.');
        return redirect()->route('permitDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function show(Permit $permit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function edit(Permit $permit)
    {
        $permitUnits = PermitUnit::get(['id', 'name']);
        $companies = Company::get(['id', 'name']);
        return view('permit.edit', compact(['permit', 'companies', 'permitUnits']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permit $permit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permit  $permit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permit $permit)
    {
        //
    }
}
