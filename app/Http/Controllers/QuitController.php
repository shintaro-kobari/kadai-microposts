<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuitController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('/quit');
    }

    public function delete() {
        // 退会処理
        //    当該ユーザーのレコードを削除(物理削除)
        $user = Auth::user();
        $user->delete();

        // HOMEにリダイレクトしてフラッシュメッセージを表示
        session()->flash('quit_message', '退会処理が完了しました。'); // 1回だけ表示される
        return redirect()->to('/home');
    }
}
