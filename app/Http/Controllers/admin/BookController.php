<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::with(['authors', 'genres'])->where('isDeleted', 0)->paginate(10);
//dd($books);
        return view('admin.book.index', compact('books'));
    }
    public function trash($id) {
        Book::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back();
    }
    public function trashshow(){
        $books = Book::where('isDeleted', 1)->paginate(10);
        return view('admin.book.trash',compact('books'));
    }

    public function restore($id) {
        Book::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back();
    }

    public function destroy($id) {
        Book::destroy($id);
        return redirect()->back();
    }
}
