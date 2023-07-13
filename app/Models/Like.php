<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [];
    //likes belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //like  belong to book
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
