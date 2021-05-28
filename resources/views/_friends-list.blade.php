<div class="bg-gray-200 border border-gray-400 rounded-lg py-4 px-6">

    <h3 class="font-bold text-xl mb-4">Followers</h3>

    <ul>
        @forelse(auth()->user()->followed as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <a href="{{ $user->path() }}" class="flex items-center text-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mr-4 text-sm"
                        width="40"
                        height="40"
                    >

                    {{ $user->name }}

                </a>
            </li>
        @empty
            <li>No friends yet</li>
        @endforelse
    </ul>
</div>

