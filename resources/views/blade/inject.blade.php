@extends('blade/app')
@inject('UserPresenter','App\Presenters\UserPresenter')
@section('content')
{{ $UserPresenter->conv($user) }}
@stop
