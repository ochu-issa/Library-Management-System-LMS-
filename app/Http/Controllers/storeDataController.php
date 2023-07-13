<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class storeDataController extends Controller
{
    //add comment to book
    public function createComment(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comment' => 'required|string|min:3'
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'Something went wrong!');
        }

        Comment::create([
            'comment' => $request->comment,
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
        ]);
        return back()->with('success', 'Your comment is now public!');
    }

    //add like to book
    public function likeBook(Request $request)
    {
        Log::info("Logging like");
        Log::info ($request->all());
        $book = Book::findOrFail($request->book_id);
        $userid = Auth::user()->id;
        if ($book) {
            $checkLike = Like::whereHas('user', function ($query) use ($userid) {
                $query->where('id', $userid);
            })->where('book_id', $book->id)->first();
            if ($checkLike) {
                //like exist
                $checkLike->delete();
                return response()->json([
                    'success' => true,
                ]);
            } else {
                $checkLike->create([
                    'book_id' => $request->book_id,
                    'user_id' => $userid,
                ]);
                return response()->json([
                    'success' => true,
                ]);
            }
        } else {
            return response()->json([
                'error' => true
            ]);
        }
    }
}
