<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Feedback;
use App\Models\Genre;
use App\Models\membership;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


    public function showDashboard()
    {
        $genres = Genre::where('isDeleted', 0)->get();
        $authors = Author::where('isDeleted', 0)->get();
        $memberships = Membership::where('isDeleted', 0)->get();
        $users = User::where('isAdmin', 0)->get();
        $adminUsers = User::where('isAdmin', 1)->get();
        $books = Book::with('genres','image')->where('isDeleted', 0)->get();

        $genresCount = count($genres);
        $authorsCount = count($authors);
        $usersCount = count($users);
        $adminUsersCount = count($adminUsers);
        $booksCount = count($books);
        $membershipsCount = count($memberships);


        return view('admin.adminDashboard',compact('genres', 'books', 'genresCount', 'authorsCount', 'usersCount', 'adminUsersCount', 'booksCount', 'membershipsCount'));
    }

    public function index(Request $request)
    {
        $author = $request->author;
        $authors = Author::where('isDeleted', 0)->search($author)->paginate(10);
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
            'name' => ['required', 'string', 'unique:author']
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
        $request->validate([
            'name' => ['required', 'string', 'unique:author']
        ]);
        Author::where('id', $id)->update([
            'name' => $request->name,
            'uId' => auth()->user()->id,
        ]);
        return redirect()->route('admin.author')->with("message", "Author Edited Successfully");
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->back()->with('message', 'Author Deleted Successfully');
    }    public function destroyFeedback($id)
    {
        Feedback::destroy($id);
        return redirect()->back()->with('message', 'Feedback Deleted Successfully');
    }

    public function feedbackSingle($id){
       $feedback = Feedback::find($id);
       return view('singleFeedback',compact('feedback'));
    }
    public function feedback()
    {
        $feedbacks = Feedback::paginate(10);
        return view ('admin.feedback',compact('feedbacks'));

    }


}
