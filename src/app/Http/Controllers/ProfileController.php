<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
        $user = Auth::user();
        return view('edit_profile', compact('profile', 'user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'address_number' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        if ($request->filled('name')) {
            $user->name = $request->input('name');
            $user->save();
        }

        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);

        $profile->fill($request->only('address_number', 'address', 'building'));

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $profile->profile_image = $imagePath;
        }

        $profile->save();

        return redirect()->route('profile.edit');
    }


    public function profile()
    {
        $user = Auth::user();

        if (!$user->profile) {
            $user->profile()->create([
                'profile_image' => null,
            ]);
        }

        $soldItems = Item::where('user_id', $user->id)->get();

        $purchasedItems = \App\Models\Order::where('user_id', $user->id)
        ->with('item')
        ->get();

        return view('profile', compact('soldItems', 'purchasedItems'));
    }
}
