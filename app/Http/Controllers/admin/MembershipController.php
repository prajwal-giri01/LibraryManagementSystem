<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\membership;

class MembershipController extends Controller
{
    public function index(){
        $memberships = Membership::where('isDeleted', 0)->paginate(10);
        return view('admin.membership.index',compact('memberships'));
    }

    public function trash($id) {
        Membership::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back();
    }

    public function restore($id) {
        Membership::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back();
    }
    public function trashshow(){
        $memberships = Membership::where('isDeleted', 1)->paginate(10);
        return view('admin.membership.trash',compact('memberships'));
    }

    public function destroy($id) {
        Membership::destroy($id);
        return redirect()->back();
    }
}
