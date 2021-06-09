<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{
    public function store(User $user) {
        auth()
            ->user()
            ->follow($user);
        return back()->with('follow', 'You followed ' . $user->username . "!");
    }

    public function destroy(User $user) {
        auth()
            ->user()
            ->unfollow($user);
        return back()->with('unfollow', 'You stopped following ' . $user->username . "!");
    }
}
