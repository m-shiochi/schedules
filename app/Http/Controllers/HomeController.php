<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\schedule;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = schedule::where('date', $cond_title)->get();
        } else {
            // それ以外は当日のスケジュールを呼び出し
            $today = Carbon::now();
            $posts = schedule::whereBetween('date', [Carbon::yesterday(), Carbon::tomorrow()])->get();
        }
        
        return view('home', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
