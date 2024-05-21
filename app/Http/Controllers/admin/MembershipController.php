<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\membership;
use App\Models\User;
use App\Models\userHasMembership;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index(Request $request){
        $membership = $request->membership;
        $memberships = Membership::where('isDeleted', 0)->search($membership)->paginate(10);
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
    public function show()
    {
        return view('admin.membership.add');
    }
    public function store(Request $request){
        $request->validate([
            'membershipLevel' => [' required', 'string', 'unique:membershiptable'],
            'numberOfBooks' => [ 'required', 'integer'] ,
            'price' => [ 'required', 'integer'],
            'benefit' => ['required', 'string']
        ]);
        membership::create(
            [
                'membershipLevel' => $request->membershipLevel,
                'numberOfBooks' => $request->numberOfBooks,
                'price' => $request->price,
                'Extra'=>$request->benefit,
                'cId' => auth()->user()->id,
                'uId' => auth()->user()->id,
            ]
        );
        return redirect()->back()->with('message', 'Membership Added Successfully');
    }

    public function edit($id){
        $membership= membership::find($id);
        return view('admin.membership.edit', compact('membership'));
    }
    public function update($id, Request $request){
        $request->validate([
            'membershipLevel' => [' required', 'string'],
            'numberOfBooks' => [ 'required', 'integer'] ,
            'price' => [ 'required', 'integer'],
            'benefit' => ['required', 'string']
        ]);
        membership::where('id',$id)->update(
            [
                'membershipLevel' => $request->membershipLevel,
                'numberOfBooks' => $request->numberOfBooks,
                'price' => $request->price,
                'Extra'=>$request->benefit,
                'uId' => auth()->user()->id,
            ]
        );
        return redirect()->route('admin.membership')->with('message', 'Membership Updated Successfully');
    }

    public function destroy($id) {
        Membership::destroy($id);
        return redirect()->back();
    }


    //user purchase membership

    public function userMembership(Request $request){
$userhasMembership = $request->userhasMembership;
        $userhasMemberships  = UserHasMembership::with('user','membership')->search($userhasMembership)->orderBy('endingDate', 'desc')->paginate(10);

        return view('admin.userHasMembership.index',compact('userhasMemberships'));
    }

    public function userMembershipPurchase(){
        $users = User::where('isDeleted',0)->get();
        $memberships = Membership::where('isDeleted', 0)->get();
        return view('admin.userHasMembership.add',compact('users', 'memberships'));
    }
    public function userMembershipPurchaseStore(Request $request){
        $request->validate([
           'email' => ['required'],
           'membership' => ['required'],
        ]);
        $user =  User::find($request->email);
        $membership = membership::find($request->membership);
        userHasMembership::create([
            'user_id' => $user->id,
            'membership_id' => $membership->id,
            'status' => 'Active',
            'endingDate' => Carbon::now()->addDays(30),

        ]);

        return redirect()->back()->with('message','membership activated successfully');
    }

    public function userMembershipPurchaseApprove($id){
        $userMembershipPurchaseApprove = userHasMembership::with(['user','membership'])->find($id);
        return view('admin.userHasMembership.approve',compact('userMembershipPurchaseApprove'));
    }

    public function userMembershipPurchaseApproveStore($id)
    {
        $membership = userHasMembership::find($id);
        $membership->update([
           'status' => 'Active',
            'startingDate' => Carbon::now(),
            'endingDate' => Carbon::now()->addDays(30),
        ]);
        return redirect()->back()->with('message','membership approved successfully');

    }
}
