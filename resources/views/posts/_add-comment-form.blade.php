@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="The image of the author avator." 
                    width="40" height="40" class="rounded-full"
                >

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea 
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring"
                    id="" cols="30" rows="5"
                    placeholder="Quick, thing of something to say!"
                    required></textarea>

                @error('body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end border-t border-gray-200 mt-6 pt-6">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a>  to leave a comment.
    </p>
@endauth