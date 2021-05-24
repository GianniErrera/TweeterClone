<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tweet;
use App\Http\Traits\Followable as Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute() {

        return "https://i.pravatar.cc/200?u=" . $this->email;

    }

    public function tweets() {

        return $this->hasMany(Tweet::class);
    }

    public function follow(User $user) {

        return $this->followed()->save($user);
    }

    public function unfollow(User $user) {

        return $this->followed()->detach($user);
    }

    public function following(User $user) {

        return $this->followed()->where('following_user_id', $user->id)->exists();

    }

    public function followed() {

        return $this->belongsToMany(User::class, 'followed_users', 'user_id', 'following_user_id');
    }

    public function timeline() {

        $followedIds = $this->followed->pluck('id');
        $followedIds->push($this->id);

        return Tweet::whereIn('user_id', $followedIds)->latest()->get();

    }


    public function getRouteKeyName() {


        return 'name';
    }


}
