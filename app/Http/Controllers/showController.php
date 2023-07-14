<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class showController extends Controller
{
    //check if authorized
    public function unAuthorized()
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Unauthorized');
        }
    }

    //view dashboard
    public function viewDashboard()
    {
        $books = Book::count();
        $likes = Like::count();
        $comments = Comment::count();
        $bookWithMostLikes = Book::withCount('likes')->orderByDesc('likes_count')->first();

        return view('dashboard', [
            'books' => $books,
            'likes' => $likes,
            'bookWithMostLike' => $bookWithMostLikes ? $bookWithMostLikes->likes_count : 0,
            'bookWithMostLikeTitle' => $bookWithMostLikes ? $bookWithMostLikes->booktitle : '',
            'comments' => $comments,
        ]);
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

    //view favorite book
    public function viewFavoriteBook()
    {
        return view('favoriteBooks');
    }

    //view profile
    public function viewProfile()
    {
        return view('profile');
    }
}
