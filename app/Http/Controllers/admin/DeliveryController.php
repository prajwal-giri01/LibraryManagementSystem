<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->location;

        $locations = Delivery::where('isDeleted', 0) ->search($location)->paginate(10);
        return view('admin.location.index', compact('locations'));
    }

    public function show()
    {
        return view('admin.location.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);
        Delivery::create([
            'address' => $request->address,
            'price' => $request->price,

        ]);

        return redirect()->back()->with('message', 'Location Added Successfully');
    }

    public function edit($id)
    {
        $location = Delivery::find($id);
        return view('admin.location.edit', compact('location'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'address' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);
        Delivery::where('id', $id)->update([
            'address' => $request->address,
            'price' => $request->price,
        ]);
        return redirect()->route('admin.location')->with("message", "location Edited Successfully");
    }

    public function trash($id)
    {
        Delivery::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back()->with('message', 'location trashed Successfully');
    }

    public function restore($id)
    {
        Delivery::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back()->with('message', 'location Restored Successfully');
    }


    public function trashshow()
    {
        $locations = Delivery::where('isDeleted', 1)->paginate(10);
        return view('admin.location.trash', compact('locations'));
    }

    public function destroy($id)
    {
        Delivery::destroy($id);
        return redirect()->back()->with('message', 'location Deleted Successfully');
    }
}
