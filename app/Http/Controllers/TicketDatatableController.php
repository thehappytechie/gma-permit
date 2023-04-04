<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class TicketDatatableController extends Controller
{
    public function ticketDatatable(Request $request)
    {
        if ($request->ajax()) {
            $tickets = Ticket::with('user')->get();
            return DataTables::of($tickets)
                ->addColumn('action', function ($ticket) {
                    return '
                        <a class="btn btn--subtle btn--sm" href="ticket/' .
                        $ticket->hash_id . '/edit" title="View"><svg width="12" height="12" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg> </a>
                ';
                })
                ->editColumn('user', function (Ticket $ticket) {
                    return $ticket->user->name;
                })
                ->editColumn('created_at', function (Ticket $ticket) {
                    return Carbon::parse($ticket->created_at)->diffForHumans();
                })
                ->editColumn('status', function (Ticket $ticket) {
                    if ($ticket->status == 0) {
                        return
                            '<span class="badge badge--warning text-xs">pending</span>';
                    } else {
                        return  '<span class="badge badge--success text-xs">completed</span>';
                    }
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('ticket.index');
    }

    public function loggedTicket(Request $request)
    {
        if ($request->ajax()) {
            $tickets = Ticket::with('user')->where('user_id', '=', Auth::user()->id)->get();
            return DataTables::of($tickets)
                ->editColumn('user', function (Ticket $ticket) {
                    return $ticket->user->name;
                })
                ->editColumn('created_at', function (Ticket $ticket) {
                    return Carbon::parse($ticket->created_at)->diffForHumans();
                })
                ->editColumn('status', function (Ticket $ticket) {
                    if ($ticket->status == 0) {
                        return
                            '<span class="badge badge--warning text-xs">pending</span>';
                    } else {
                        return  '<span class="badge badge--success text-xs">completed</span>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('ticket.logged');
    }
}
