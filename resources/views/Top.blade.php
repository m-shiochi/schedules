@extends('layouts.Toplayout')

@section('title', 'Top')

@section('content')
    <header>
        <div class="container">
            <hr color="#c0c0c0">
            <h1>Welcome to our Scheduler</h1>
            <p>これは個人で作成したスケジュール管理のホームページです。このアプリを使用した損失や情報の漏洩に関しまして、自己責任でお願いいたします</p>
        </div>
    </header>
    
    <div class="container">
        <hr color="#c0c0c0">
            <h1>How to use</h1>
            
            <div class="row">
            <div class="card text-center col-md-4">
                <div class="top_icon">
                    <img src="{{ secure_asset('img/Login.JPG') }}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">ログイン</h5>
                    <p class="card-text">まずはログイン画面より、ログインしてください。また、新規ユーザの方は、同ページの「新規登録」よりユーザ登録を行ってください</p>
                    <a href="{{ url('/login') }}" class="btn btn-primary">ログイン画面へ</a>
                </div>
            </div>
            
            <div class="card text-center col-md-4">
                <div class="top_icon">
                    <img src="{{ secure_asset('img/Schedule.JPG') }}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">スケジュール確認</h5>
                    <p class="card-text">ホーム画面では当日のスケジュールが確認できます。ほかのスケジュールは一覧画面よりご確認ください。</p>
                    <a href="{{ url('/home') }}" class="btn btn-primary">本日のスケジュール</a>
                </div>
            </div>
            
            <div class="card text-center col-md-4">
                <div class="top_icon">
                    <img src="{{ secure_asset('img/createNew.JPG') }}" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">新規予定作成</h5>
                    <p class="card-text">予定を新規に登録する際、「新規予定作成」から予定をご入力ください。</p>
                    <a href="{{ url('/admin/schedule/create') }}" class="btn btn-primary">新規予定作成</a>
                </div>
            </div>
            </div>
            
    </div>
@endsection