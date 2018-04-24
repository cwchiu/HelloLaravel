@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    今天是 {{$tw_now->toDateString()}}
    </div>
    <div class="row">
    台灣時間 {{$tw_now}}
    </div>
    <div class="row">
    日本時間 {{$ja_now}}
    </div>
    <div class="row">
    明年的元旦是星期 {{$next_year_day}}
    </div>
    <div class="row">
    距離現在還有 {{$next_year->diffForHumans($tw_now)}}
    </div>
</div>
@endsection
