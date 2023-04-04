<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\TicketEdit;
use App\Http\Requests\TicketCreate;
use App\Mail\TicketCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
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
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketCreate $request)
    {
        $ticket = new Ticket;
        $data = $request->validated();
        $ticket->fill($data);
        $ticket->user_id = Auth::user()->id;
        $ticket->save();
        $request->session()->flash('success', 'Ticket created successfully.');

        Mail::to('augustine.chinful@ghanamaritime.org')->send(new TicketCreated($ticket));

        return redirect()->route('ticket.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketEdit $request, Ticket $ticket)
    {
        $data = $request->validated();
        $ticket->update($data);
        $request->session()->flash('success', 'Ticket updated successfully.');
        return redirect()->route('ticketDatatable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
