<?php

namespace App\Http\Controllers;
use App\Models\Tweet;
use App\Models\User;


use Illuminate\Http\Request;

class TweetsController extends Controller
{

    public function index() {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store() {
        request()->validate(['body' => 'required|max:255']);
        $tweet = new Tweet();
        $tweet->user_id = auth()->id();
        $tweet->body = request('body');
        $tweet->save();
        return redirect()->route('home');
    }

    public function test() {
        $user = User::find(20);
        Tweet::find(22)->like(false);

    }
}
