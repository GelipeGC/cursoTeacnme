@extends('layout')

@section('content')
	<div class="container">
	{!! Form::select('state',$states,null,['id' =>'state'])!!}


	{!! Form::select('municipio',['placeholder' => 'Selecciona'],null,['id' =>'municipio'])!!}
	</div>
@endsection