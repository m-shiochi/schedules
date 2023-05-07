@extends('layouts.adminlayout')
@section('title', 'スケジュールの新規作成')

@section('content')
    <div class="row text-center">
        <h3>新規予定作成</h3>
    </div>
    <form action="{{ route('admin.schedule.create') }}" method="post" enctype="multipart/form-data">

        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        
            <!-- User_idの取得 -->
        <div>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        </div>
        
            <!-- タイトルの入力 -->
        <div class="form-group row">
            <label class="col-md-2">タイトル</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="タイトル">
            </div>
        </div>
            
            <!-- 予定時刻の入力 -->
        <div class="form-group row">
            <label for="date" class="col-form-label col-md-2">予定日時</label>
            <div class="col-md-10">
                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>
        </div>
        
            <!-- 予定場所の入力 -->
        <div class="form-group row">
            <label class="col-md-2">予定場所</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="場所">
            </div>
        </div>
        
            <!-- 詳細を入力 -->
        <div class="form-group row">
            <label class="col-md-2">詳細</label>
            <div class="col-md-10">
                <textarea class="form-control" name="body" rows="5" placeholder="やるべきこと、誰と、費用etc.">{{ old('body') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">画像</label>
            <div class="col-md-10">
                <input type="file" class="form-control-file" name="image">
            </div>
        </div>
        @csrf
        <input type="submit" class="btn btn-primary" value="保存">
    </form>
@endsection