<?php

namespace App\Http\Controllers;

use App\Models\PermitUnit;
use Illuminate\Http\Request;
use App\Http\Requests\PermitUnitEdit;
use App\Http\Requests\PermitUnitCreate;
use App\Imports\PermitUnitsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\File;
class PermitUnitController extends Controller
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
        return view('permit-unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permit-unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermitUnitCreate $request)
    {
        $permitUnit = new PermitUnit();
        $data = $request->validated();
        $permitUnit->fill($data);
        $permitUnit->save();
        $request->session()->flash('success', 'Permit Unit created successfully.');
        return redirect()->route('permitUnitDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermitUnit  $permitUnit
     * @return \Illuminate\Http\Response
     */
    public function show(PermitUnit $permitUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermitUnit  $permitUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(PermitUnit $permitUnit)
    {
        return view('permit-unit.edit', compact('permitUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermitUnit  $permitUnit
     * @return \Illuminate\Http\Response
     */
    public function update(PermitUnitEdit $request, PermitUnit $permitUnit)
    {
        $data = $request->validated();
        $permitUnit->update($data);
        $request->session()->flash('success', 'Permit Unit updated successfully.');
        return redirect()->route('permitUnitDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermitUnit  $permitUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermitUnit $permitUnit)
    {
        //
    }

    public function importPermitUnit(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                File::types(['csv'])->max(12 * 1024),
            ],
        ]);
        Excel::import(new PermitUnitsImport, request()->file('file'));
        $request->session()->flash('success', 'Permit Unit imported successfully');
        return redirect()->route('permitUnitDatatable');
    }
}
