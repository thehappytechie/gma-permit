<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;
use App\Http\Requests\VesselEdit;
use App\Http\Requests\VesselCreate;
use App\Imports\VesselsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\File;

class VesselController extends Controller
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
        return view('vessels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VesselCreate $request)
    {
        $vessel = new Vessel;
        $data = $request->validated();
        $vessel->fill($data);
        $vessel->save();
        $request->session()->flash('success', 'Vessel created successfully.');
        return redirect()->route('vesselDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function show(Vessel $vessel)
    {
        $vessel->load('certificates');
        return view('vessels.show', compact('vessel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function edit(Vessel $vessel)
    {
        return view('vessels.edit', compact('vessel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function update(VesselEdit $request, Vessel $vessel)
    {
        $data = $request->validated();
        $vessel->update($data);
        $request->session()->flash('success', 'Vessel updated successfully.');
        return redirect()->route('vesselDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vessel $vessel)
    {
        //
    }

    public function importVessel(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                File::types(['csv'])->max(12 * 1024),
            ],
        ]);
        Excel::import(new VesselsImport, request()->file('file'));
        $request->session()->flash('success', 'Vessels imported successfully');
        return redirect()->route('vesselDatatable');
    }
}
