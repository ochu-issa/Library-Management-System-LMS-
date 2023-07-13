<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageBooks extends Component
{
    public $booktitle, $bookauthor, $booktype, $description;

    protected function rules()
    {
        return [
            'booktitle' => ['required', 'string', 'unique:books'],
            'bookauthor' => ['required', 'string'],
            'description' => ['required', 'string'],
            'booktype' => ['required', 'string'],
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function storeBook()
    {
        $validatedData = $this->validate();
        $userId = Auth::user()->id;
        $validatedData['user_id'] = $userId;
        Book::create($validatedData);
        session()->flash('success', 'Book created successfully!');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->booktitle = "";
        $this->bookauthor = "";
        $this->booktype = "";
        $this->description = "";
    }

    public function render()
    {
        $books = Book::latest()->with('user')->get();
        return view('livewire.manage-books', [
            'books' => $books,
        ]);
    }
}
