@extends('layouts.app')

@section('content')
<div class="container">
<form class="form-group" method="post" action="{{ route('captcha.post') }}">
    <label for="captcha" class="col-md-4 control-label">驗證碼</label>
        <input id="captcha" type="captcha" class="form-control" name="captcha" required>
        <img src="{{ captcha_src() }}" />
        @if ($errors->has('captcha'))
            <span class="help-block">
                <strong>{{ $errors->first('captcha') }}</strong>
            </span>
        @endif
    {{ csrf_field() }}
    <button type="submit" class="btn btn-default">測試</button>
</form>
</div>
@endsection
