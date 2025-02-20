<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $itemId)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // コメントを保存
        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $itemId,
            'content' => $request->input('content'),
        ]);

        return redirect()->route('item.show', ['id' => $itemId])->with('success', 'コメントを投稿しました！');
    }
}
