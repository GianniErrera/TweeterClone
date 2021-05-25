<?php

namespace App\Http\Traits;
use App\Models\User;

trait Followable {

    public function follow(User $user) {
        return $this->followed()->save($user);
    }

    public function unfollow(User $user) {
        return $this->followed()->detach($user);
    }

    public function toggleFollow(User $user) {
        $this->followed()->toggle($user);
    }

    public function following(User $user) {
        return $this->followed()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows() {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }
}
