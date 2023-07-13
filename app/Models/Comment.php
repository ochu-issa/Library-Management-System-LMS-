<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    //comment belong to user
    public function user()
    {
        $this->belongsTo(User::class);
    }

    //comment belong to book
    public function book()
    {
        $this->belongsTo(Book::class);
    }
}
