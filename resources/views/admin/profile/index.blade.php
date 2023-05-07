@extends('layouts.profilelayout')
@section('title', 'プロフィール')

@section('content')
    <div class="row text-center">
        <h3>プロフィール</h3>
    </div>
    
    @foreach($posts as $news)
        @if($news['user_id'] == Auth::id())
            <div class="form-group row">
                <div class="col-md-6">
                    <h3>{{ $news->name }}</h3>
                    <p class="col-md-10">{{ $news->gender }}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ secure_asset('storage/image/' . $news->image_path) }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">興味</label>
                <p class="col-md-10">{{ $news->introduction }}</p>
            </div>
            <div class="container">
                    <a href="{{ route('admin.profile.edit', ['id' => $news->id]) }}" role="button" class="btn btn-primary">編集</a>
            </div>
        @endif
    @endforeach
    
    <hr color="#c0c0c0">
    <div class="mx-auto text-center">
        <p>プロフィールを作成していない方は、こちらからどうぞ</p>
        <a href="{{ route('admin.profile.add') }}" role="button" class="btn btn-primary">新規作成</a>
    </div>
@endsection