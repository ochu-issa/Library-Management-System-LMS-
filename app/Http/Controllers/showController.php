<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class showController extends Controller
{
    //view dashboard
    public function viewDashboard()
    {
        return view('dashboard');
    }

    //view books
    public function viewBooks()
    {
        return view('book');
    }

    //view book details
    public function bookDetails($id)
    {
        $books = Book::findOrFail($id);
        return view('bookDetails', ['book' => $books]);
    }
}
