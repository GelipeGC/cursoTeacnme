<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketVote extends Model
{
    public function ticket()
	{
		return $this->belongsTo(Ticket::class);
	}
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
