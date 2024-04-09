<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'author' => [ 'required', 'exists:author,id'] ,
            'genre' => [ 'required', 'exists:genre,id'],
            'quantity' => [ 'required', 'integer'],
            'image' => ['required','mimes:jpg,jpeg,mp4,mov,ogg'],
        ]);
        $image=$request->image;
        $image_name = date('Y-m-d') . '--' . (pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();


        try {
            DB::beginTransaction();

            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'quantity' => $request->quantity,
            ]);

            BookImage::create([
                'book_id' => $book->id,
                'image' => $image_name,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
           return redirect()->back()->with('error',"Server Side Error Is Occurring.");
        }

        $image->storePubliclyAs('public/books/images', $book->id . '/' .$image_name);
        return redirect()->back()->with('message',"Book Added Successfully.");
    }

    public function edit($id){
        $book = Book::find($id);
        $authors = Author::where('isDeleted',0)->get();
        $genres = Genre::where('isDeleted',0)->get();
        return view('admin.book.edit',compact('book','authors','genres'));
    }

    public function update($id, Request $request){
        $request->validate([
            'title' => ['required', 'string', 'unique:book,title,'.$id],
            'author' => ['required', 'exists:author,id'],
            'genre' => ['required', 'exists:genre,id'],
            'quantity' => ['required', 'integer'],
        ]);

        if($request->has('image')){
            $request->validate([
                'image' => ['required', 'mimes:jpeg,jpg,png,gif'],
            ]);
        }
        try {
            DB::beginTransaction();


            $book = Book::findOrFail($id);
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'quantity' => $request->quantity,
            ]);
            if($request->has('image')) {
                $image=$request->image;
                $image_name = date('Y-m-d') . '--' . (pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
                $bookImage = BookImage::where('book_id', $id)->first();
                if($bookImage){
                    $bookImage->update([
                        'image' => $image_name,
                    ]);
                }else{
                    BookImage::create([
                        'book_id' => $id,
                        'image' => $image_name,
                    ]);
                }

                $image->storePubliclyAs('public/books/images', $id . '/' .$image_name);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',"Server Side Error Is Occurring.");
        }
        return redirect()->back()->with('message',"Book Updated Successfully.");


    }

    public function destroy($id) {
        Book::destroy($id);
        return redirect()->back();
    }
}
