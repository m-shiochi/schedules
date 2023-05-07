@extends('layouts.adminlayout')
@section('title', 'スケジュールの編集')

@section('content')
    <div class="row text-center">
        <h3>予定編集</h3>
    </div>
    <form action="{{ route('admin.schedule.update') }}" method="post" enctype="multipart/form-data">
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
        
            <!-- タイトルの入力 -->
        <div class="form-group row">
            <label class="col-md-2">タイトル</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="title" value="{{ $news_form->title }}" placeholder="タイトル">
            </div>
        </div>
            
            <!-- 予定時刻の入力 -->
        <div class="form-group row">
            <label for="date" class="col-form-label col-md-2">予定日時</label>
            <div class="col-md-10">
                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $news_form->date }}">
            </div>
        </div>
        
            <!-- 予定場所の入力 -->
        <div class="form-group row">
            <label class="col-md-2">予定場所</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="location" value="{{ $news_form->location }}" placeholder="場所">
            </div>
        </div>
        
            <!-- 詳細を入力 -->
        <div class="form-group row">
            <label class="col-md-2">詳細</label>
            <div class="col-md-10">
                <textarea class="form-control" name="body" rows="5" placeholder="やるべきこと、誰と、費用etc.">{{ $news_form->body }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="image">画像</label>
            <div class="col-md-10">
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
        <div class="form-group row">
            <div class="col-md-10">
                <input type="hidden" name="id" value="{{ $news_form->id }}">
                @csrf
                <input type="submit" class="btn btn-primary" value="更新">
            </div>
        </div>
    </form>
@endsection