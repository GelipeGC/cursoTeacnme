<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Entities\Ticket;
use App\Entities\TicketComment;

class TicketsController extends Controller
{
    public function latest()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
    	return view('tickets/lists', compact('ticket'))->with('tickets', $tickets);
    } 
    public function popular()
    {
    	 $tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
        return view('tickets/lists', compact('ticket'))->with('tickets', $tickets);
    }
    public function open()
    {
        //$tickets = \DB::table('tickets')->where('status', '=', 'open')->get();
         //dd($tickets); 
        $tickets = Ticket::where('status','=', 'open')->orderBy('created_at', 'DESC')->get();
    	return view('tickets/ticketsopen', compact('ticket'))->with('tickets', $tickets);
    }
    public function closed()
    {
    	$tickets = Ticket::where('status', '=', 'closed')->orderBy('created_at', 'DESC')->paginate();
        return view('tickets/ticketsclosed', compact('ticket'))->with('tickets', $tickets);
    }
    public function details($id)
    {
        $ticket = Ticket::findOrFail($id);
        $comments = TicketComment::where('ticket_id', $id)->get();
    	return view('tickets/details', compact('ticket'));
    }
    public function create()
    {
        return  view('tickets.create');
    }
    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [

            'title' => 'required|max:120'
            ]);
        $ticket = $auth->user()->tickets()->create([
            'title' => $request->get('title'),
            'status' => 'open'
            ]);
        return Redirect::route('tickets.details', $ticket->id);

    }
}
