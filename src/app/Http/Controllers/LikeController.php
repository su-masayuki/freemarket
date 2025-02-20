<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $item = Item::findOrFail($id);

        // 既にいいねしているか確認
        $like = Like::where('user_id', $user->id)->where('item_id', $item->id)->first();

        if ($like) {
            $like->delete(); // いいね解除
            $liked = false;
        } else {
            Like::create(['user_id' => $user->id, 'item_id' => $item->id]);
            $liked = true;
        }

        $likeCount = Like::where('item_id', $item->id)->count();

        return response()->json(['liked' => $liked, 'likeCount' => $likeCount]);
    }

    public function toggle(Item $item)
    {
        $user = Auth::user();

        if ($item->likes()->where('user_id', $user->id)->exists()) {
            // いいね解除
            $item->likes()->detach($user->id);
        } else {
            // いいね追加
            $item->likes()->attach($user->id);
        }

        return back();
    }
}