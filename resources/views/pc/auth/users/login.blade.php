@section('title', trans('lang.login'))
@extends('pc.layouts.auth')
@section('content')
    <div class="login_wrapper">
        <section class="login_content">
            {!! Form::open(['url' => 'user/login', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
            <h1>Login User</h1>
            <div class="item form-group @if ($errors->has('email')) bad @endif">
                @if ($errors->has('email'))
                    <span class="text-danger text-left">
                            {{ $errors->first('email') }}
                        </span>
                @endif
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Username']) !!}
            </div>
            <div class="item form-group @if ($errors->has('password')) bad @endif">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">
                            {{ $errors->first('password') }}
                        </span>
                @endif
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>
            <div>
                <button type="submit" class="btn btn-default submit">@lang('lang.login')</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">
                    <a class="to_register" href="{{ url('user/password/reset') }}">
                        <i class="fa fa-life-ring" aria-hidden="true"></i> Click here if you forgot your password
                    </a>
                </p>

                <div class="clearfix"></div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection
