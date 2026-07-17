<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function create()
    {
        return view('frontend.address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:100',
            'phone' => 'required|digits:10',
            'email' => 'nullable|email',
            'house_no' => 'required',
            'street' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required|digits:6',
            'landmark' => 'nullable',
            'type' => 'required|in:Home,Office',
        ]);

        if ($request->is_default) {
            Address::where('user_id', Auth::id())
                ->update(['is_default' => 0]);
        }

        Address::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'house_no' => $request->house_no,
            'street' => $request->street,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'landmark' => $request->landmark,
            'type' => $request->type,
            'is_default' => $request->has('is_default'),
        ]);

        return redirect()
            ->route('checkout.index')
            ->with('success', 'Address Added Successfully.');
    }

    public function edit($id)
    {
        $address = Address::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('frontend.address.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|max:100',
            'phone' => 'required|digits:10',
            'email' => 'nullable|email',
            'house_no' => 'required',
            'street' => 'required',
            'area' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required|digits:6',
            'landmark' => 'nullable',
            'type' => 'required|in:Home,Office',
        ]);

        $address = Address::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($request->is_default) {
            Address::where('user_id', Auth::id())
                ->update(['is_default' => 0]);
        }

        $address->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'house_no' => $request->house_no,
            'street' => $request->street,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'landmark' => $request->landmark,
            'type' => $request->type,
            'is_default' => $request->has('is_default'),
        ]);

        return redirect()
            ->route('checkout.index')
            ->with('success', 'Address Updated Successfully.');
    }

    public function destroy($id)
    {
        $address = Address::where('user_id', Auth::id())
            ->findOrFail($id);

        $address->delete();

        return back()->with('success', 'Address Deleted Successfully.');
    }

    public function setDefault($id)
    {
        Address::where('user_id', Auth::id())
            ->update(['is_default' => 0]);

        Address::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['is_default' => 1]);

        return back()->with('success', 'Default Address Updated.');
    }
}