<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\profile;

class ProfileController extends Controller
{
    // add, create, edit, updata actionを追記
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, profile::$rules);

        $news = new profile;
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
        
        return redirect('admin/profile/');
    }
    
    public function index(Request $posts)
    {
        $posts = profile::all();
        
        return view('admin.profile.index', ['posts' => $posts]);
    }
    
    public function edit(Request $request)
    {
        // profile Modelからデータを取得する
        $news = profile::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.profile.edit', ['news_form' => $news]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, profile::$rules);
        // News Modelからデータを取得する
        $news = profile::find($request->id);
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

        return redirect('admin/profile/');
       
    }
}
