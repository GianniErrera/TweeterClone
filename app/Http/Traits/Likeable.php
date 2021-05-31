<?php

namespace App\Http\Traits;

use App\Models\Tweet;
use App\Models\Like;

trait Likeable {

    public function like($liked = true) {
    //dd($user->id);
    $this->likes()->updateOrCreate([
        'user_id' => auth()->id()
    ], [
        'liked' => $liked,
        'disliked' => false
    ]);
}

    public function dislike($disliked = true) {
        //dd($user->id);
        $this->likes()->updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'liked' => false,
            'disliked' => $disliked
        ]);
    }

    public function likes() {

        return $this->hasMany(Like::class);
    }
}
