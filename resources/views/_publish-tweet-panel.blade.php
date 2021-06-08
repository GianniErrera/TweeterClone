<div class="border border-blue-400 border-lg px-8 py-6 mb-8">
    <form method="POST"
        action="/tweets"
        enctype="multipart/form-data">
        @csrf
        <textarea
            name="body"
            class="w-full"
            placeholder="what's up, doc?"
            required
            autofocus
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <div class="flex items-center">
                <div>
                    <img
                    src="{{ auth()->user()->avatar }}"
                    alt="your avatar"
                    class="rounded-full mr-2"
                    width="50"
                    height="50"
                    >
                </div>

                <div class="mb-6">
                        <input class="border border-gray-400 my-2 p-2 w-full"
                               type="file"
                               name="attached_image"
                               id="attached_image"
                               accept="image/*"
                        >
                    @error('attached_image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-3xl shadow py-4 px-10 text-sm text-white"
                >
                Tweet-a-roo!
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2"> {{ $message }} </p>
    @enderror

</div>
