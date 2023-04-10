<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Requests\CertificateEdit;
use App\Http\Requests\CertificateCreate;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vessels = Vessel::get(['id', 'name']);
        return view('certificate.create', compact('vessels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificateCreate $request)
    {
        $certificate = new Certificate();
        $data = $request->validated();
        $certificate->fill($data);
        $certificate->save();
        $request->session()->flash('success', 'Certificate created successfully.');
        return redirect()->route('certificateDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        $vessels = Vessel::orderBy('name', 'asc')->get(['id', 'name']);
        return view('certificate.edit', compact('certificate', 'vessels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(CertificateEdit $request, Certificate $certificate)
    {
        $data = $request->validated();
        $certificate->update($data);
        $request->session()->flash('success', 'Certificate updated successfully.');
        return redirect()->route('certificateDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
