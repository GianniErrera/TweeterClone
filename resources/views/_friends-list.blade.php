<h3 class="font-bold text-xl mb-4">Followers</h3>

<ul>
    @foreach(auth()->user()->followers as $user)
    <li class="mb-4">
        <div class="flex items-center">
            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full mr-4 text-sm"
            >

            {{ $user->name }}

        </div>
    </li>
    @endforeach
</ul>
