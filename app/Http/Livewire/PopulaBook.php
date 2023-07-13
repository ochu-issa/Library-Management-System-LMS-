<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PopulaBook extends Component
{
    public function render()
    {

        $books = Book::withCount('likes')->orderBy('likes_count', 'asc')->get();
        return view('livewire.popula-book', ['books'=>$books]);
    }
}
