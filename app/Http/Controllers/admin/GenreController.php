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
        return redirect()->back();
    }

    public function restore($id) {
        Genre::where('id', $id)->update([
            'isDeleted' => 0
        ]);
        return redirect()->back();
    }
    public function trashshow(){
        $genres = Genre::where('isDeleted', 1)->paginate(10);
        return view('admin.genre.trash',compact('genres'));
    }

    public function destroy($id) {
        Genre::destroy($id);
        return redirect()->back();
    }
}
