@section('title', trans('lang.reset_password'))
@extends('pc.layouts.auth')
@section('content')
    <div class="login_wrapper">
        <section class="login_content">
            {!! Form::open(['url' => 'user/password/reset', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <h1>@lang('lang.reset_password')</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div class="item form-group @if ($errors->has('email')) bad @endif">
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('lang.email')]) !!}
            </div>
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <div class="item form-group @if ($errors->has('password')) bad @endif">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('lang.password')]) !!}
            </div>
            @if ($errors->has('password_confirmation'))
                <div class="alert alert-danger">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
            <div class="item form-group @if ($errors->has('password_confirmation')) bad @endif">
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('lang.password_confirmation')]) !!}
            </div>
            <div>
                <button type="submit" class="btn btn-default submit">@lang('lang.reset_password')</button>
            </div>
            <div class="clearfix"></div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection

