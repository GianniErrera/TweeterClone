<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;


class ProfilesController extends Controller
{
    public function show(User $user) {
         return view('profiles.show', [
             'user' => $user,
             'tweets' => $user->tweets()->paginate(10)
         ]);
    }

    public function edit(User $user) {
        if ($user->isNot(current_user())) {
            abort(404);
        }
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $attributes= request()->validate([
            'username' => [
                'string', 'required', 'max:255',
                Rule::unique('users', 'username')->ignore($user->id)
            ],
            'name' => 'string|required|max:255',
            'bio' => 'nullable|string|max:160',
            'email' => [
                'string', 'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'password' => 'nullable|string|min:8|max:255|confirmed',
            'avatar' => 'nullable|file',
            'banner' => 'nullable|file'
        ]);
        if(request('bio')) {
            $attributes['bio'] = request('bio');
        }
        if(request('password')) {
            $attributes['password'] = bcrypt(request('password'));
        } else {
            $attributes['password'] = $user->password;
        }
        if(request('avatar')) {
        $attributes['avatar'] = request('avatar')->store('avatars');
        }
        if(request('banner')) {
            $attributes['banner'] = request('banner')->store('banners');
            }
        $user->update($attributes);
        return redirect($user->path());
    }
}
