<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    //book belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //book has many like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //book has many Favorite
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
