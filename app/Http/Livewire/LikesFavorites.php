<?php

namespace App\Http\Livewire;

use App\Models\Book;
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

    public function favorite()
    {
    }
}
