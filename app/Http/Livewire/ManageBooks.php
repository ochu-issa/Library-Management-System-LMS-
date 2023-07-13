<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ManageBooks extends Component
{
    public $booktitle, $bookauthor, $booktype, $description, $book_id;

    protected function rules()
    {
        return [
            'booktitle' => [
                'required',
                'string',
                Rule::unique('books')->ignore($this->book_id),
            ],
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

    //edit subject data
    public function updateBook()
    {
        $validatedData = $this->validate();
        Book::where('id',  $this->book_id)->update([
            'booktitle' => $validatedData['booktitle'],
            'bookauthor' => $validatedData['bookauthor'],
            'booktype' => $validatedData['booktype'],
            'description' => $validatedData['description'],
        ]);

        session()->flash('success', 'Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //edit functions
    public function editBook(int $bookid)
    {
        $this->book_id = $bookid;
        $book = Book::find($bookid);
        if ($book) {
            $this->booktitle = $book->booktitle;
            $this->bookauthor = $book->bookauthor;
            $this->booktype = $book->booktype;
            $this->description = $book->description;
        } else {
            return redirect('/book');
        }
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
