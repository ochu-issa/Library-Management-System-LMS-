<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FoviriteBook extends Component
{

    public function render()
    {
        $books = Favorite::where('user_id', Auth::id())->latest()->get();
        return view('livewire.fovirite-book', ['books' => $books]);
    }
}
