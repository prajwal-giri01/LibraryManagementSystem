<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Delivery;
use App\Models\Feedback;
use App\Models\Genre;
use App\Models\membership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing(){
        $addresses = Delivery::where('isDeleted', 0)->get();
        $genres = Genre::where('isDeleted', 0)
            ->whereHas('books')
            ->get();
        $books = Book::with('genres','image','authors')->where('isDeleted',0)->get();


        return view('landing', compact('genres', 'books','addresses'));
    }

    public function genre($id)
    {
        $addresses = Delivery::where('isDeleted', 0)->get();
        $books = Book::where([
            ['genre', $id],
            ['isDeleted', 0]
        ])->get();


        return view('genre', compact('books','addresses'));
    }


    public function genreAll()
    {
        $genres = Genre::where('isDeleted',0)->get();
        return view('allCategories', compact('genres'));
    }


    public function search(Request $request)
    {
        $addresses = Delivery::where('isDeleted', 0)->get();
        $search = $request->search;
        $books = Book::search($search)->get();
        return view('genre', compact('books','addresses'));
    }


    public function feedback(Request $request){
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
           "feedback"  => ['required']
        ]);


        Feedback::create([
           "name"=> $request->name,
            "email" => $request->email,
            "feedback" => $request->feedback,
        ]);
        return redirect()->back()->with('message','feedback recorded');
    }
    public function book($id)
    {
        $addresses = Delivery::where('isDeleted', 0)->get();
        $book = Book::with('authors','image','genres')->find($id);
        $books = Book::with('authors','image','genres')->where('genre', $book->genre)->get();
        return view('bookDetail',compact('book','books','addresses'));
    }

}
