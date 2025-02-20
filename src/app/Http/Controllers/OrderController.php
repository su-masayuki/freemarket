<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, $item_id)
    {

        $item = Item::findOrFail($item_id);

        if ($item->is_sold) {
            return redirect()->route('items.index');
        }

        Order::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id
        ]);

        $item->is_sold = true;
        $item->save();

        return redirect()->route('items.index');
    }
}
