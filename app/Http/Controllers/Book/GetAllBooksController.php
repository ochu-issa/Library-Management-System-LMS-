<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetAllBooksController extends Controller
{
    //Get all Books
    public function getAllBook()
    {
        // $books = Book::latest()->with('user')->get()->paginate(10);
        $books = Book::with('user')->paginate(10);

        return response()->json([
            'data' => $books
        ]);


    }

    //Get books with most likes
    public function booksWithMostLikes()
    {
        $books = Book::withCount('likes')->orderBy('likes_count', 'desc')->get();

        return response()->json([
            'book' => $books
        ]);
    }
}
