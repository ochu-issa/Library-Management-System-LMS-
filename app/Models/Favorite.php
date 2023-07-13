<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Favorite belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //Favorite belong to book
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
