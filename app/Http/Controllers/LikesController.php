<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class LikesController extends Controller
{
    public function like(Tweet $tweet, $liked=false) {
        $tweet->like($liked);
        return back();
    }

    public function dislike(Tweet $tweet, $disliked=false) {
        $tweet->dislike($disliked);
        return back();
    }
}
