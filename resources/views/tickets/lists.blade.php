@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                	Solicitudes Populares
                	<a href="{{ route('tickets.create')}}" class="btn btn-primary">Nueva Solicitud</a>
                </h1>
                <p class="label label-info news"> hay {{ $tickets->total()}} solicudydes</p>
                @foreach($tickets as $ticket)
                @include('tickets/partials/item', compact('ticket'))
                @endforeach

                {!! $tickets->render()!!}
            </div>

        </div>
    </div>
</div>

@endsection