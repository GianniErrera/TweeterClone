<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{
    public function store(User $user) {
        if(!auth()->user()->following($user)) {
        auth()
            ->user()
            ->follow($user);
        } else {
            auth()
            ->user()
            ->unfollow($user);
        }

        return back();

    }
}
