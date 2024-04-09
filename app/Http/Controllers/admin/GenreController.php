<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
    $genres = Genre::where('isDeleted', 0)->paginate(10);
    return view('admin.genre.index',compact('genres'));
}

    public function trash($id) {
        Genre::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back()->with('message','Genre Trashed Successfully');
    }

    public function restore($id) {
        Genre::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back()->with('message','Genre Restored Successfully');
    }
    public function trashshow(){
        $genres = Genre::where('isDeleted', 1)->paginate(10);
        return view('admin.genre.trash',compact('genres'));
    }
public function show()
{
    return view('admin.genre.add');
}
    public function store(Request $request){

        $request->validate([
            'name'=>[' required', 'string','unique:author']
        ]);
        Genre::create([
            'name'=>$request->name,
            'cId'=>auth()->user()->id,
            'uId'=>auth()->user()->id,
        ]);

        return redirect()->back()->with('message','Genre Added Successfully');
    }
    public function edit($id)
    {
        $genre =Genre::find($id);
        return view('admin.genre.edit', compact('genre'));
    }

    public function update($id, Request $request)
    {
        Genre::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.genre')->with("message", "Genre Edited Successfully");
    }

    public function destroy($id) {
        Genre::destroy($id);
        return redirect()->back()->with('message','Genre Deleted Successfully');
    }
}
