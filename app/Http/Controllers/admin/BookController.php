<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

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
    public function show(){
        $authors = Author::where('isDeleted',0)->get();
        $genres = Genre::where('isDeleted',0)->get();
        return view('admin.book.add',compact('authors','genres'));
    }

    public function store(Request $request){

        $request->validate([
           'title' => [' required', 'string', 'unique:book'],
            'author' => [ 'required', 'string', 'exists:author,name'] ,
            'genre' => [ 'required', 'string', 'exists:genre,name'],
            'quantity' => [ 'required', 'integer']
        ]);


    }
    public function destroy($id) {
        Book::destroy($id);
        return redirect()->back();
    }
}
