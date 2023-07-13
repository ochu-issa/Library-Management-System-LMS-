<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class showController extends Controller
{
    //view dashboard
    public function viewDashboard()
    {
        return view('dashboard');
    }

    //view user
    public function viewUser()
    {
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
}
