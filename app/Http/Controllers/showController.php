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
        $book = Book::find($id);
        return view('bookDetails', compact('book'));
    }

    //get popular book
    public function viewPopularBook()
    {
        return view('populaBook');
    }
}
