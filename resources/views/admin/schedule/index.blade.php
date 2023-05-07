@extends('layouts.adminlayout')
@section('title', 'スケジュールの一覧')

@section('content')
    <div class="row text-center">
        <h3>スケジュール一覧</h3>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('admin.schedule.add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8">
            <form action="{{ route('admin.schedule.index') }}" method="get">
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
    
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="25%">予定日時</th>
                    <th width="15%">タイトル</th>
                    <th width="10%">予定日時</th>
                    <th width="30%">詳細</th>
                    <th width="20%">操作</th>
                </tr>
            </thead>
            <tbody class="table-striped">
                @foreach($posts as $news)
                    @if($news['user_id'] === Auth::id())
                    <tr>
                        <th>{{ $news->date }}</th>
                        <td>{{ Str::limit($news->title, 15) }}</td>
                        <td>{{ Str::limit($news->location, 10) }}</td>
                        <td>{{ Str::limit($news->body, 20) }}</td>
                        <td>
                            <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.schedule.edit', ['id' => $news->id]) }}">編集</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.schedule.delete', ['id' => $news->id]) }}">削除</a>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection