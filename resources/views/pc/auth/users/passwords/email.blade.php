@section('title', trans('lang.forget_password'))
@extends('pc.layouts.auth')
@section('content')
    <div class="login_wrapper">
        <section class="login_content">
            {!! Form::open(['url' => 'user/password/email', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
            <h1>Email address</h1>
            @if ( session('status') )
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="item form-group @if ($errors->has('email')) bad @endif">
                @if ($errors->has('email') )
                    <span class="text-danger">
                        {{ $errors->first('email') }}
                    </span>
                @endif
                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('lang.email')]) !!}
            </div>
            <p>ご登録いただいているメールアドレスを入力して『送信する』ボタンを押してください。
                パスワード再設定用のURLが記載された確認メールをお送りします</p>
            <div>
                <button type="submit" class="btn btn-default submit">Send Reset Mail</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <p class="change_link">
                    <a class="to_register" href="{{ url('/user/login') }}">
                        <i class="fa fa-sign-in"></i> Back
                    </a>
                </p>
                <div class="clearfix"></div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection
