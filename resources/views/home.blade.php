@extends('layouts.adminlayout')

@section('title', 'Home')

@section('content')
    <div class="row text-center">
        <h3>本日のスケジュール</h3>
    </div>

    <div class="row">
        <hr color="#c0c0c0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="25%">予定日時</th>
                        <th width="15%">タイトル</th>
                        <th width="10%">予定場所</th>
                        <th width="50%">詳細</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($posts as $news)
                        @if($news['user_id'] == Auth::id())
                        <tr>
                            <th>{{ $news->date }}</th>
                            <td>{{ Str::limit($news->title, 15) }}</td>
                            <td>{{ Str::limit($news->location, 10) }}</td>
                            <td>{{ Str::limit($news->body, 40) }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('admin.schedule.add') }}" role="button" class="btn btn-primary">新規予定作成</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.schedule.index') }}" role="button" class="btn btn-primary">スケジュール一覧</a>
        </div>
        <div class="col-md-6">
            <form action="{{ route('home.index') }}" method="get">
                <div class="form-group row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="2023-04-30 12:00:00">
                    </div>
                    <div class="col-md-2">
                        @csrf
                    <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
           
@endsection
