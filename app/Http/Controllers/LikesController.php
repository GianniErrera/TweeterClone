<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class LikesController extends Controller
{
    public function like(Tweet $tweet, $liked) {
        $tweet->like($liked);
        return back();
    }

    public function dislike(Tweet $tweet, $liked) {
        $tweet->dislike($liked);
        return back();
    }
}
