<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Ticket;
use App\Http\Requests;

class VotesController extends Controller
{
    public function submit($id)
    {
    	$ticket = Ticket::findOrFail($id);

    	currentUser()->vote($ticket);

        return redirect()->back();
    	
    }
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        currentUser()->unvote($ticket);
        return redirect()->back();
    	
    }
}
