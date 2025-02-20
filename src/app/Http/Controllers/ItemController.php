<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    public function sell()
    {
        return view('sell');
    }

    /**
     * 商品詳細ページ表示
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item', compact('item'));
    }

    /**
     * 購入ページの表示
     *
     * @param int $item_id
     * @return \Illuminate\View\View
     */
    public function purchase($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = Auth::user();
        $profile = $user->profile; // ユーザープロフィール取得

        return view('purchase', compact('item', 'user', 'profile'));
    }

    /**
     * 商品一覧ページ表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        if ($user && !$user->profile) {
            return redirect()->route('profile.edit')->with('error', 'プロフィールを登録してください');
        }

        $userId = Auth::id();
        $items = Item::when($userId, function ($query, $userId) {
            return $query->where(function ($q) use ($userId) {
                $q->whereNull('user_id')
                ->orWhere('user_id', '!=', $userId);
            });
        })->with('likes')->get();

        return view('index', compact('items'));
    }


    /**
     *
     *
     * @return \Illuminate\View\View
     */
    public function likedItems()
    {
        $user = Auth::user();
        $items = $user->likes()->with('item')->get()->pluck('item');
        return view('index', compact('items'));
    }

    /**
     *
     *
     * @param Item $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleLike(Item $item)
    {
        $user = Auth::user();

        if ($item->isLikedBy($user)) {
            $item->likes()->detach($user->id); // いいね解除
            $liked = false;
        } else {
            $item->likes()->attach($user->id); // いいね登録
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'like_count' => $item->likes()->count()
        ]);
    }

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $items = Item::where('item_name', 'LIKE', "%{$keyword}%")->get();

        return view('index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
            'condition' => 'required|string',
            'item_name' => 'required|string|max:255',
            'item_description' => 'required|string|max:1000',
            'item_price' => 'required|integer|min:1',
        ]);

        $item = new Item();
        $item->item_url = $request->file('item_url')->store('uploads', 'public');
        $item->category = $validated['category'];
        $item->item_condition = $validated['condition'];
        $item->item_name = $validated['item_name'];
        $item->item_describe = $validated['item_description'];
        $item->price = $validated['item_price'];

        $item->user_id = Auth::id();

        $item->save();

        return redirect()->route('items.index')->with('success', '商品が登録されました！');
    }

    public function profile()
    {
        $user = Auth::user();

        // 出品した商品
        $soldItems = Item::where('user_id', $user->id)->get();

        // 購入した商品
        $purchasedItems = Order::with('item')->where('user_id', $user->id)->get();

        return view('profile', compact('soldItems', 'purchasedItems'));
    }
}