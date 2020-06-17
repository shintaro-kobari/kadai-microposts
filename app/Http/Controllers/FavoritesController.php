<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{
    /**
     * ユーザをfavoriteするアクション。
     *
     * @param  $id  micropostのid
     * @return \Illuminate\Http\Response
     */
    public function store($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、 idのmicropostをfavoriteする
        \Auth::user()->favorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back()->with([
            'message' => __('messages.favorited'),
        ]);
    }

    /**
     * ユーザをunfavoriteするアクション。
     *
     * @param  $id  micropostのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropost_id)
    {
        // 認証済みユーザ（閲覧者）が、 idのmicropostをunfavoriteする
        \Auth::user()->unfavorite($micropost_id);
        // 前のURLへリダイレクトさせる
       return back()->with([
            'message' => __('messages.unfavorited'),
        ]);
    }
}