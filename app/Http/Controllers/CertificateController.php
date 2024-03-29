<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vessel;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Requests\CertificateEdit;
use App\Http\Requests\CertificateCreate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CertificateController extends Controller
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
        return view('certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
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
        return redirect()->route('editCertificateDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate = Certificate::first();
        $certificate->delete();
        session()->flash('error', 'Certificate deleted successfully.');
        return redirect()->route('editCertificateDatatable');
    }
}
