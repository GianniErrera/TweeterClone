@unless(auth()->user()->is($user))
    @unless (current_user()->following($user)) <!--if user is not currently following profile a follow form is displayed -->
        <form method="POST" action="/profiles/{{ $user->username }}/follow">
            @csrf
            <button class="bg-blue-500 hover:bg-blue-600 rounded-full shadow py-2 px-4 text-white text-xs">
                {{ 'Follow' }}
            </button>
        </form>
    @else <!-- if user is currently following profile a follow form is displayed -->
        <form method="POST" action="/profiles/{{ $user->username }}/unfollow">
            @csrf
            <button class="bg-red-500 hover:bg-red-600 rounded-full shadow py-2 px-4 text-white text-xs">
                Unfollow
            </button>
        </form>
    @endif
@endunless
