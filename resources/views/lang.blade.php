@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    {{trans('hello.hi')}}
    </div>
    <div class="row">
    {{trans('hello.two', ['name'=>$name])}}
    </div>
</div>
@endsection
