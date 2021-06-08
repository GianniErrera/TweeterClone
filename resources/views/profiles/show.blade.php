<x-app>
    <div>
        <header class="mb-6 relative">
            <div class="relative">
                <img
                src="{{ $user->banner }}"
                alt=""
                class="mb-2"
                >

                <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mr-2 absolute bottom-0 transform -translate-x-2/4 translate-y-2/4"
                    style="left: 50%"
                    width="150px"
                >
            </div>

            <div class="flex justify-between items-center mb-6">
                <div style="max-width: 270px">
                    <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                    <p class="text-sm"> Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>
                <div class="flex">
                    @can('edit', $user)
                        <a href="{{ $user->path('edit') }}"
                        class="rounded-full shadow py-2 px-4 border border-gray-300 text-black text-xs mr-2"
                        >
                            Edit profile
                        </a>
                    @endcan
                    <x-follow-button :user="$user"></x-follow-button>
                </div>
            </div>

            <p class="text-sm">
                {{ $user->bio }}
            </p>

        </header>

        <hr>

        @include('_timeline', [
            'tweets' => $tweets
        ])

    </div>

</x-app>


