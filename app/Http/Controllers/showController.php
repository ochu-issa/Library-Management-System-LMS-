<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showController extends Controller
{
    //check if authorized
    public function unAuthorized()
    {
        if(!Auth::user()->hasRole('admin')){abort(403, 'Unauthorized');}
    }

    //view dashboard
    public function viewDashboard()
    {
        return view('dashboard');
    }

    //view user
    public function viewUser()
    {
        $this->unAuthorized();
        return view('user');
    }

    //view books
    public function viewBooks()
    {
        return view('book');
    }

    //view book details
    public function bookDetails($id)
    {
        $books = Book::find($id);

        if ($books) {
            $comments = Comment::where('book_id', $books->id)->with('user')->get();
        } else {
            // Book not found
        }

        //dd($comments);

        return view('bookDetails', ['book' => $books, 'comments' => $comments]);
    }

    //get popular book
    public function viewPopularBook()
    {
        return view('populaBook');
    }
}
