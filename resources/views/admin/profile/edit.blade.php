@extends('layouts.profilelayout')
@section('title', 'プロフィール編集')

@section('content')
    
    <div class="row text-center">
        <h3>プロフィール編集</h3>
    </div>
    
    <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        <!-- User_idの取得 -->
        <div>
            <input type="hidden" name="user_id" value="{{ $news_form->user_id }}">
        </div>
        <div class="form-group row">
            <label class="col-md-2">お名前</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="name" value="{{ $news_form->name }}" placeholder="Your name">
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control-file" name="image">
                <div class="form-text text-info">
                    <img src="{{ secure_asset('storage/image/' . $news_form->image_path) }}">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                    </label>
                </div>
                
            </div>
        </div>
        
        <div class="form row">
            <label class="col-md-2">性別</label>
            <div class="col-2">
                <label><input type="radio" name="gender" value="男性" {{ $news_form->gender }}>男性</label>
            </div>
            <div class="col-2">
                <label><input type="radio" name="gender" value="女性" {{ $news_form->gender }}>女性</label>
            </div>
            <div class="col-6">
                <label><input type="radio" name="gender" value="どちらでもない" {{ $news_form->gender }}>どちらでもない</label>                             
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2">興味</label>
            <div class="col-md-10">
                <textarea class="form-control" name="introduction" rows="3" placeholder="運動、好きな科目etc.">{{ $news_form->introduction }}</textarea>
            </div>
        </div>
        @csrf
        <div class="form-group row">
            <div class="col-md-10">
                <input type="hidden" name="id" value="{{ $news_form->id }}">
                @csrf
                <input type="submit" class="btn btn-primary" value="更新">
            </div>
        </div>
    </form>
@endsection