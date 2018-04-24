@extends('blade/app')
@section('content')
@if(count($error))
{{ $error->first() }}
@endif

@stop
