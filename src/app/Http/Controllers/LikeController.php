<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Item;

class LikeController extends Controller
{
    // コメントページ表示用メソッド
    public function showComments($item_id)
{
    $item = Item::findOrFail($item_id);
    $comments = $item->comments()->with('user.profile')->get();

    return view('comment', compact('item', 'comments'));
}



    // コメント保存用メソッド
    public function storeComment(Request $request, $item_id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($item_id);

        $comment = new Comment();
        $comment->item_id = $item->id;
        $comment->user_id = auth()->id();
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->route('comment.show', ['item_id' => $item->id])
            ->with('success', 'コメントが投稿されました！');
    }

}
