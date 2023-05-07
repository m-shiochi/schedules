<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\schedule;

class ScheduleController extends Controller
{
    // Add action の追加
    public function add()
    {
        return view('admin.schedule.create');
    }
    
    // 以下を追記
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, schedule::$rules);

        $news = new schedule;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $news->fill($form);
        $news->save();
        
        // admin/schedule/createにリダイレクトする
        return redirect('admin/schedule/');
    }
    
    // 
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = schedule::where('date', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = schedule::all();
        }
        return view('admin.schedule.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    // 以下を編集と更新機能の追加

    public function edit(Request $request)
    {
        // myschedule Modelからデータを取得する
        $news = schedule::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.schedule.edit', ['news_form' => $news]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, schedule::$rules);
        // News Modelからデータを取得する
        $news = schedule::find($request->id);
        // 送信されてきたフォームデータを格納する
        $news_form = $request->all();
        
        // 画像でエラーが出るため、回避処理
        
        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;
        }
        
        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);

        // 該当するデータを上書きして保存する
        $news->fill($news_form)->save();

        return redirect('admin/schedule');
    }
    
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $news = schedule::find($request->id);

        // 削除する
        $news->delete();

        return redirect('admin/schedule/');
    }
    
}
