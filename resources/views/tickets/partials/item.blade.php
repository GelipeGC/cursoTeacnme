<div data-id="25" class="well well-sm request">
	<h4 class="list-title">
		{{$ticket->title}}
	       @include('tickets/partials/status', compact('ticket'))
	<p>
		<a href="{{ route('tickets.details', $ticket) }}">
			<span class="votes-count">{{count($ticket->voters)}} votos</span>
			<span class="comments-count">{{count($ticket->comments)}} comentarios</span>
		</a>
	</p>
	<p class="vote-user">
	@foreach($ticket->voters as $user)
	<span class="label label-info"> {{ $user->name}}</span>
	@endforeach
	</p>
	<p class="date-t"><span class="glyphicon glyphicon-item"></span> {{ $ticket->created_at->format('d/m/Y h:ia')}}</p>
</div>