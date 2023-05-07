@extends('layouts.Toplayout')

@section('title', 'Login')

@section('content')
    <div class="login-box card">
        <div class="login-header card-header mx-auto">{{ __('messages.login') }}</div>

        <div class="login-body card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('messages.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.remember_me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mx-auto text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.login') }}
                    </button>
                </div>
                
            </form>
        </div>
    </div>
    <!-- 新規ユーザ登録案内 -->
    <hr color="#c0c0c0">
    <div class="mx-auto text-center">
        <p>ユーザ登録をまだお済でない方はこちらから新規登録を行ってください</p>
        <a href="{{ route('register') }}" role="button" class="btn btn-info">新規登録</a>
    </div>
@endsection