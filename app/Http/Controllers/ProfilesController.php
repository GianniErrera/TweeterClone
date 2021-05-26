<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;


class ProfilesController extends Controller
{
    public function show(User $user) {
         return view('profiles.show', compact('user'));
    }

    public function edit(User $user) {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $attributes= request()->validate([
            'username' => [
                'string', 'required', 'max:255',
                Rule::unique('users', 'username')->ignore($user->id)
            ],
            'name' => 'string|required|max:255',
            'email' => [
                'string', 'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'avatar' => 'file'
        ]);
        if(request('avatar')) {
        $attributes['avatar'] = request('avatar')->store('avatars');
        }
        $user->update($attributes);
        return redirect($user->path());
    }
}
