@extends('layouts.profilelayout')
@section('title', 'プロフィール新規作成')

@section('content')
    
    <div class="row text-center">
        <h3>プロフィール新規作成</h3>
    </div>
    
    <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

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
        
        <div class="form-group row">
            <label class="col-md-2">お名前</label>
            <div class="col-md-4">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your name">
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control-file" name="image">
                <label>写真</label>
            </div>
        </div>
        
        <div class="form row">
            <label class="col-md-2">性別</label>
            <div class="col-2">
                <label><input type="radio" name="gender" value="男性" {{ old('gender') }}>男性</label>
            </div>
            <div class="col-2">
                <label><input type="radio" name="gender" value="女性" {{ old('gender') }}>女性</label>
            </div>
            <div class="col-6">
                <label><input type="radio" name="gender" value="どちらでもない" {{ old('gender') }}>どちらでもない</label>                             
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-md-2">興味</label>
            <div class="col-md-10">
                <textarea class="form-control" name="introduction" rows="3" placeholder="運動、好きな科目etc.">{{ old('introduction') }}</textarea>
            </div>
        </div>
        @csrf
        <input type="submit" class="btn btn-primary" value="作成">
    </form>
@endsection