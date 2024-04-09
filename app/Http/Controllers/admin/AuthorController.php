<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


    public function showDashboard()
    {
        return view('admin.adminDashboard');
    }

    public function index()
    {
        $authors = Author::where('isDeleted', 0)->paginate(10);
        return view('admin.author.index', compact('authors'));
    }


    public function trash($id)
    {
        Author::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back()->with('message', 'Author trashed Successfully');
    }

    public function restore($id)
    {
        Author::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back()->with('message', 'Author Restored Successfully');
    }


    public function trashshow()
    {
        $authors = Author::where('isDeleted', 1)->paginate(10);
        return view('admin.author.trash', compact('authors'));
    }


    public function show()
    {
        return view('admin.author.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => [' required', 'string', 'unique:author']
        ]);
        Author::create([
            'name' => $request->name,
            'cId' => auth()->user()->id,
            'uId' => auth()->user()->id,
        ]);

        return redirect()->back()->with('message', 'Author Added Successfully');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin.author.edit', compact('author'));
    }

    public function update($id, Request $request)
    {
        Author::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.author')->with("message", "Author Edited Successfully");
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->back()->with('message', 'Author Deleted Successfully');
    }


}
