<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\LocationEdit;
use App\Http\Requests\LocationCreate;
use Monarobase\CountryList\CountryListFacade;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superuser']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('locationDatatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
        return view('location.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationCreate  $request)
    {
        $location = new Location;
        $data = $request->validated();
        $location->fill($data);
        $location->save();
        $request->session()->flash('success', 'Location created successfully.');
        return redirect()->route('locationDatatable');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $countries = CountryListFacade::getList('en');
        return view('location.edit', compact(['location', 'countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(LocationEdit $request, Location $location)
    {
        $data = $request->validated();
        $location->update($data);
        $request->session()->flash('success', 'Location updated successfully.');
        return redirect()->route('locationDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
