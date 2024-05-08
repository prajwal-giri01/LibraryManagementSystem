<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\membership;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function membership()
    {
        $memberships = membership::where('isdeleted',0)->get();
        return view('user.membership.membership',compact('memberships'));
    }
}
