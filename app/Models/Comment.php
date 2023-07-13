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
       return $this->belongsTo(User::class);
    }

    //comment belong to book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
