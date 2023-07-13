<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Favorite;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikesFavorites extends Component
{
    public $likes;
    public $favorites;
    public $bookId;
    public $isLiked;
    public $isFavorite;


    //mount the data 
    public function mount($bookId)
    {
        $this->bookId = $bookId;
        $book = Book::find($bookId);
        $this->likes = $book->likes->count();
        $this->favorites = $book->favorites->count();
        $this->isLiked = $book->likes->where('user_id', Auth::id())->count() > 0;
        $this->isFavorite = $book->favorites->where('user_id', Auth::id())->count() > 0;
    }

    public function render()
    {
        return view('livewire.likes-favorites');
    }

    //function to like the book
    public function like()
    {
        $book = Book::find($this->bookId);
        $isLiked = $book->likes->where('user_id', Auth::id())->count() > 0;
        if ($isLiked) {
            Like::where('user_id', Auth::id())->delete();
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'book_id' => $this->bookId,
            ]);
        }
        $this->mount($this->bookId);
    }

    //function to mark book as favorite
    public function favorite()
    {
        $book = Book::find($this->bookId);
        $isFavorite = $book->favorites->where('user_id', Auth::id())->count() > 0;
        if ($isFavorite) {
            Favorite::where('user_id', Auth::id())->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'book_id' => $this->bookId,
            ]);
        }
        $this->mount($this->bookId);
    }
}
