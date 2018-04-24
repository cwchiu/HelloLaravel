@extends('blade/app')
@section('content')
<h1>hello world</h1>

@if($type == 1)
<div>jack</div>
@else
<div>bob</div>
@endif

<ul>
@foreach($data as $value)
   <li>{{$value}}</li>
@endforeach
</ul>

@stop
