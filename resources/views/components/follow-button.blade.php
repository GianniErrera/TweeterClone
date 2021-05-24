@unless (auth()->user()->following($user)) <!--if user is not currently following profile a follow form is displayed -->
    <form method="POST" action="/profiles/{{ $user->name }}/follow">
        @csrf
        <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
            {{ 'Follow' }}
        </button>
    </form>
@else <!-- if user is currently following profile a follow form is displayed -->
    <form method="POST" action="/profiles/{{ $user->name }}/unfollow">
        @csrf
        <button class="bg-red-500 rounded-full shadow py-2 px-4 text-white text-xs">
            Unfollow
        </button>
    </form>
@endif
