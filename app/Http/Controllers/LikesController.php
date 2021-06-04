<?php

namespace App\Http\Controllers;
use App\Models\Like;

use Illuminate\Http\Request;
use App\Models\Tweet;
use DB;

class LikesController extends Controller
{
    public function like(Tweet $tweet, $liked=false) {
        $like = DB::table('likes')
        ->where('tweet_id', $tweet->id)
        ->where('user_id', current_user()->id)
        ->where('liked', true);
        if ($like->exists()) {
                $like->delete();
        } else {
            $tweet->like($liked);
        }
        return back();
    }

    public function dislike(Tweet $tweet, $disliked=false) {
        $dislike = DB::table('likes')
        ->where('tweet_id', $tweet->id)
        ->where('user_id', current_user()->id)
        ->where('disliked', true);
        if ($dislike->exists()) {
                $dislike->delete();
        } else {
            $tweet->dislike($disliked);
        }
        return back();
    }
}
