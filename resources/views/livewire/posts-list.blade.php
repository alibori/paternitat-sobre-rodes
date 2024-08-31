<ul class="mt-10 space-y-10">
    @foreach($posts as $post)
        <li class="bg-polygon w-full py-4" wire:key="post-{{ $post->id }}">
            <span class="bg-polygon-fill opacity-25" style="background-color: {{ $post->category->label_color }};"></span>
            <p class="mb-2 text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
            </p>
            <h5 class="font-medium text-lg text-gray-800">
                <a href="{{ route('posts.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h5>
            <span class="block w-min mt-1 py-1 px-3 rounded-md text-sm text-white" style="background-color: {{ $post->category->label_color }};">
                {{ $post->category->name }}
            </span>
            <p class="mt-1 text-md text-gray-500 line-clamp-3">
                {{ $post->excerpt }}
            </p>
            <p class="mt-1">
                <a class="text-sm text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2" href="{{ route('posts.show', $post->slug) }}">
                    {{ __('Continue reading') }}
                </a>
            </p>
        </li>
    @endforeach

    @if($posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            {{ $posts->links() }}
    @endif
</ul>
