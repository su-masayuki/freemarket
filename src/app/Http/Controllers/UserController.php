<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class UserController extends Controller
{

    public function profile()
    {
        return view('profile');
    }

    public function edit_profile()
    {
        return view('edit_profile');
    }

    public function editAddress($item_id)
    {
        $user = auth()->user();
        $profile = $user->profile;

        $item = Item::findOrFail($item_id);

        return view('edit_address', compact('profile','item'));
    }

    public function updateAddress(Request $request, $item_id)
    {
        $request->validate([
            'address_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $profile = $user->profile;

        $profile->address_number = $request->address_number;
        $profile->address = $request->address;
        $profile->building = $request->building;
        $profile->save();

        return redirect()->route('item.purchase', ['item_id' => $item_id]);
    }

}
