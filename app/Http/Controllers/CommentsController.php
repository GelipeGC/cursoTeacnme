<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Entities\Ticket;
use App\Entities\TicketComment;
class CommentsController extends Controller
{
    public function submit(Request $request, Guard $auth, $id)
    {
    	$this->validate(
    		$request, [
    			'comment'	=>'required|max:250',
    			'link'		=>'url'
    		]);
    	
    	$comment = new TicketComment($request->all());
    	$comment->user_id = $auth->id();

    	$ticket = Ticket::findOrFail($id);
    	$ticket->comments()->save($comment);
    	session()->flash('success', 'Tu comentario fue guardado exitosamente');
    	return redirect()->back();
    }
}
