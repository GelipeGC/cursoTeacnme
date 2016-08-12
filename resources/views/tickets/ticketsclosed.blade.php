@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                	Tickets Finalizados
                	<a href="#" class="btn btn-primary">Nueva Solicitud</a>
                </h1>
                  @foreach($tickets as $ticket)
                    @include('tickets/partials/item', compact('ticket'))
                  @endforeach          
            </div>

        </div>
    </div>
</div>

@endsection