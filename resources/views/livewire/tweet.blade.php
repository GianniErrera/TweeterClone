<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-4 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>
    <div>
        <div class="flex flex-row content-between">
            <div>
                <h5 class="font-bold mb-4">
                    <a href="{{ $tweet->user->path() }}">
                        {{ $tweet->user->name }}
                    </a>
                </h5>
            </div>
            {{-- <div>
                <form method="POST" action= {{ route('dislike.tweet',
                    ['tweet' => $tweet,
                    'disliked' => $tweet->isDislikedBy(current_user())]
                    ) }}>
                    @csrf
                    <div class="flex items-center mt-1">
                        <button type="submit">
                            <div class= "place-self-end">
                                <img src="/images/trash.svg" /
                                width="15"
                                height="15"
                                ">
                            </div>
                        </button>
                    </div>
                </form>
            </div> --}}
            {{-- <div class= "place-self-end">
                    <img src="/images/trash.svg" /
                    width="15"
                    height="15"
                    ">
            </div> --}}
        </div>

        <div>
        <p class="text-sm mb-3"> {{ $tweet->body }} </p>
        </div>

        @if($tweet->attached_image)
            <img
                src={{asset('storage/' .  $tweet->attached_image) }}
                class = "my-2"
            />
        @endif

        <div class="flex">
            <x-like-dislike-buttons :tweet=$tweet />
        </div>
    </div>
</div>

