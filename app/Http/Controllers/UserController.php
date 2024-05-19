<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\membership;
use App\Models\Rentbook;
use App\Models\User;
use App\Models\userHasMembership;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard(Request $request)
    {
        $user = $request->user();
        return view('user.dashboard', compact('user'));

    }

    public function membership()
    {
        $userHasValidMembership = userHasMembership::where('user_id',auth()->user()->id)->where('status','active')->first();
        if ($userHasValidMembership) {
            $currentMembership = Membership::where('id', $userHasValidMembership->membership_id)->first();
            $memberships = Membership::where('isdeleted', 0)->where('id', '!=', $userHasValidMembership->membership_id)->get();
            return view('user.membership.hasMembership', compact('memberships', 'currentMembership'));
        } else {
            $memberships = Membership::where('isdeleted', 0)->get();
            return view('user.membership.membership', compact('memberships'));
        }
    }

    public function membershipPurchase($id, Request $request)
    {
        $request->validate([
            'image' => ['required', 'mimes:jpeg,jpg,png,gif']
        ]);
        $image = $request->image;
        $image_name = date('Y-m-d') . '--' . (pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $user = auth()->user()->id;
        $membership = membership::find($id);
        $membershipCreated = userHasMembership::create([
            'user_id' => $user,
            'membership_id' => $membership->id,
            'endingDate' => Carbon::now()->addDays(30),
            'status' => 'pending',
            'qr' => $image_name,
        ]);

        $image->storePubliclyAs('public/membership/', $user . '/' . $image_name);
        return redirect()->back()->with('message', 'Membership Purchased Successfully');
    }

    public function bookPurchasePickup($id, Request $request)
    {

        $request->validate([
            'startingDate' => ['required'],
            'endingDate' => ['required'],
        ]);
        $book = Book::find($id);
        $user = auth()->user()->id;

        Rentbook::create([
            'user_id' => $user,
            'book_id' => $book->id ,
            'startingDate' => $request->startingDate,
            'endingDate' => $request->endingDate,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('message', 'book request has been placed');


    }
    public function bookPurchaseDelivery($id, Request $request)
    {

        $request->validate([
            'startingDate' => ['required'],
            'endingDate' => ['required'],
            'address' => ['required']
        ]);
        $book = Book::find($id);
        $user = auth()->user()->id;

        Rentbook::create([
            'user_id' => $user,
            'book_id' => $book->id,
            'delivery' => $request->address,
            'startingDate' => $request->startingDate,
            'endingDate' => $request->endingDate,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('message', 'book request has been placed');


    }

    public function bookOrder()
    {
        $currentBooks = Rentbook::where('user_id', auth()->user()->id)
            ->whereIn('status', ['Ongoing', 'Pending'])
            ->paginate(12);
        return view('user.book.current',compact('currentBooks'));
    }
    public function bookOrderHistory()
    {
        $currentBooks = Rentbook::where('user_id', auth()->user()->id)
            ->where('status', 'Completed')
            ->paginate(12);
        return view('user.book.history',compact('currentBooks'));
    }
}
