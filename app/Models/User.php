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
        'username',
        'name',
        'email',
        'password',
        'avatar'
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

    public function getAvatarAttribute($value) {
        return asset('storage/' . $value);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)
            ->latest();
    }

    public function timeline() {
        $followedIds = $this->followed->pluck('id');
        $followedIds->push($this->id);
        return Tweet::whereIn('user_id', $followedIds)
            ->latest()
            ->get();
    }

    public function path($append = "") {
        $path = route('profile', $this->username);
        return $append ? "{$path}/$append" : $path;
    }


    public function getRouteKeyName() {
        return 'name';
    }


}
