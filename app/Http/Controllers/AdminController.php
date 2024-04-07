<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function storeAuthor(Request $request){
        $request->validate([
           'author'=>['required', 'string'],
        ]);
         Author::create([
            'name' => $request->author,
             'cId'=> auth()->user()->id,
            'uId'=> auth()->user()->id,
        ]);
         return redirect(route('admin.author.index'))->with('success','Author Created Successfully');
    }


    public function storeGenra(Request $request){
        $request->validate([
            'author'=>['required', 'string'],
        ]);
        Genra::create([
            'name' => $request->author,
            'cId'=> auth()->user()->id,
            'uId'=> auth()->user()->id,
        ]);
        return redirect(route('admin.genra.index'))->with('success','Author Created Successfully');
    }
}
