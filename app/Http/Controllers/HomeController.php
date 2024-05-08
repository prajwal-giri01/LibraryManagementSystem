<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Feedback;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function landing(){

        $genres = Genre::where('isDeleted',0)->get();
        $books = Book::with('genres','image')->where('isDeleted',0)->get();
        return view('landing', compact('genres', 'books'));
    }

    public function genre($id){
        $books = Book::where([
            ['genre', $id],
            ['isDeleted', 0]
        ])->get();
        if($books){
            return view('genre',compact('books'));
        }else{
            $books = Book::where([
                'isDeleted', 0
            ])->get();
            return view('genre',compact('books'))->with('error','Books within the designated genre are currently unavailable.');
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::search($search)->get();
        return view('genre', compact('books'));
    }

    public function feedback(){
        return view("feedback");
    }
    public function feedbackStore(Request $request){
        $request->validate([
           "feedback"  => ['required']
        ]);


        Feedback::create([
           "name"=> $request->name,
            "email" => $request->email,
            "feedback" => $request->feedback,
        ]);
        return view('landing');
    }

}
