<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Genre;
use App\Models\Rentbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function rent()
    {
        $rentedBooks = Rentbook::with(['user', 'book'])->paginate(10);
        return view('admin.rentedBook.index', compact('rentedBooks'));
    }

    public function rentSingle($id)
    {
        $rentedBook = Rentbook::with(['user', 'book','delivery'])->find($id);
        return view('admin.rentedBook.single', compact('rentedBook'));
    }

    public function statusOngoing($id)
    {
        $Book = Rentbook::find($id);
        $Book->update([
            'status' => 'Ongoing',
        ]);
        return redirect()->back()->with('message', 'status changed successfully');
    }

    public function statusCompleted($id, Request $request)
    {
        $Book = Rentbook::find($id);
        if ($request->damaged == 'on') {
            $isdamaged = 1;
            $request->validate([
                'amount' => 'required'
            ]);
            $Book->update([
               'isDamaged' =>  $isdamaged,
                'penaltyAmount' => $request->amount,
                'status' => 'Completed'
            ]);

        } else {
            $isdamaged = 0;
            $Book->update([
                'status' => 'Completed'
            ]);
        }
        return redirect()->back()->with('message', 'status changed successfully');
    }

    public function index(Request $request)
    {
        $book = $request->book;
        $books = Book::with(['authors', 'genres'])->filter($book)->where('isDeleted', 0)->paginate(10);
        return view('admin.book.index', compact('books'));
    }

    public function trash($id)
    {
        Book::where('id', $id)->update([
            'isDeleted' => 1
        ]);
        return redirect()->back();
    }

    public function trashshow()
    {
        $books = Book::where('isDeleted', 1)->paginate(10);
        return view('admin.book.trash', compact('books'));
    }

    public function restore($id)
    {
        Book::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back();
    }

    public function show()
    {
        $authors = Author::where('isDeleted', 0)->orderBy('name')->get();
        $genres = Genre::where('isDeleted', 0)->orderBy('name')->get();
        return view('admin.book.add', compact('authors', 'genres'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => [' required', 'string', 'unique:book'],
            'author' => ['required', 'exists:author,id'],
            'genre' => ['required', 'exists:genre,id'],
            'quantity' => ['required', 'integer', 'gt:0'],
            'image' => ['required', 'mimes:jpg,jpeg,mp4,mov,ogg'],
            'description' => [' required', 'string'],
        ]);
        $image = $request->image;
        $image_name = date('Y-m-d') . '--' . (pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();


        try {
            DB::beginTransaction();

            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'quantity' => $request->quantity,
                'Extra' => $request->description,
            ]);

            BookImage::create([
                'book_id' => $book->id,
                'image' => $image_name,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', "Server Side Error Is Occurring.");
        }

        $image->storePubliclyAs('public/books/images', $book->id . '/' . $image_name);
        return redirect()->back()->with('message', "Book Added Successfully.");
    }

    public function edit($id)
    {
        $book = Book::with('image')->find($id);
        $authors = Author::where('isDeleted', 0)->orderBy('name')->get();
        $genres = Genre::where('isDeleted', 0)->orderBy('name')->get();
        return view('admin.book.edit', compact('book', 'authors', 'genres'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:book,title,' . $id],
            'author' => ['required', 'exists:author,id'],
            'genre' => ['required', 'exists:genre,id'],
            'quantity' => ['required', 'integer', 'gt:0'],
            'description' => [' required', 'string'],
        ]);

        if ($request->has('image')) {
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
                'Extra' => $request->description,
            ]);
            if ($request->has('image')) {
                $image = $request->image;
                $image_name = date('Y-m-d') . '--' . (pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
                $bookImage = BookImage::where('book_id', $id)->first();
                if ($bookImage) {
                    $bookImage->update([
                        'image' => $image_name,
                    ]);
                } else {
                    BookImage::create([
                        'book_id' => $id,
                        'image' => $image_name,
                    ]);
                }

                $image->storePubliclyAs('public/books/images', $id . '/' . $image_name);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', "Server Side Error Is Occurring.");
        }
        return redirect()->back()->with('message', "Book Updated Successfully.");


    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->back();
    }


}
