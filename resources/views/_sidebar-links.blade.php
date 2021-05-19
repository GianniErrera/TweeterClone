
<ul>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="something"
        >
            Home
        </a>
    </li>


    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/explore"
        >
            Explore
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/notifications"
        >
            Notifications
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/messages"
        >
            Messages
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/bookmarks"
        >
            Bookmarks
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/lists"
        >
            Lists
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/profile"
        >
            Profile
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="/more"
        >
            More
        </a>
    </li>

    @auth
        <li>
            <a
                class="font-bold text-lg mb-4 block"
                href="{{ "something_else" }}"
            >
                Profile
            </a>
        </li>

        <li>
            <form method="POST" action="/logout">
                @csrf

                <button class="font-bold text-lg">Logout</button>
            </form>
        </li>
    @endauth
</ul>
