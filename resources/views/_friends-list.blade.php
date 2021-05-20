<h3 class="font-bold text-xl mb-4">Followers</h3>

<ul>
    @foreach(auth()->user()->followed as $user)
            <li class="mb-4">
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mr-4 text-sm"
                    >

                    {{ $user->name }}

                </a>
            </li>
    @endforeach
</ul>
