<x-slot:title>
    {{ $post->title }} - {{ \App\Facades\Setting::get('site_name') }}
</x-slot>

<x-slot:description>
    {{ $post->metadata?->description }}
</x-slot>

<x-slot:keywords>
    {{ $post->metadata?->keywords }}
</x-slot>

<!-- Blog Article -->
<div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">

        <!-- Avatar Media -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex w-full sm:items-center gap-x-5 sm:gap-x-3">
                <div class="grow">
                    <div class="flex justify-between items-center gap-x-2">
                        <div>
                            <!-- Tooltip -->
                            <div class="hs-tooltip [--trigger:hover] [--placement:bottom] inline-block">
                                <div class="hs-tooltip-toggle sm:mb-1 block text-start">
                  <span class="font-semibold text-gray-800">
                    {{ $post->user->name }}
                  </span>
                                </div>
                            </div>
                            <!-- End Tooltip -->

                            <ul class="text-s text-gray-500">
                                <li class="inline-block relative pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full">
                                    {{ $post->created_at->isoFormat('d MMMM, Y') }}
                                </li>
                                <li class="inline-block relative pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full">
                                    {{ \Illuminate\Support\Str::readDuration($post->content) }} {{ __('min read') }}
                                </li>
                            </ul>
                        </div>

                        <!-- Button Group -->
                        <div>
                            <button type="button"
                                    class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    onclick="shareOnTwitter('{{ route('posts.show', $post->slug) }}', '{{ __('Take a look on this:') }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                </svg>
                                {{ __('Share') }}
                            </button>
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Avatar Media -->

        <!-- Content -->
        <div class="space-y-5 md:space-y-8">
            <div class="space-y-3">
                <h2 class="text-2xl font-bold md:text-3xl">{{ $post->title }}</h2>

                <span class="block w-min mt-1 py-1 px-3 rounded-md text-sm text-white"
                      style="background-color: {{ $post->category->label_color }};">
                        {{ $post->category->name }}
                    </span>
            </div>

            <div class="bg-polygon mt-1 py-4">
                <span class="bg-polygon-fill bg-white"></span>
                {!! $post->content !!}
            </div>
        </div>
        <!-- End Content -->

</div>
<!-- End Blog Article -->

<script>
    function shareOnTwitter(link, text) {
        const twitterIntentURL = "https://twitter.com/intent/tweet";
        const contentQuery = `?url=${encodeURIComponent(link)}&text=${encodeURIComponent(text)}`;
        const shareURL = twitterIntentURL + contentQuery;
        window.open(shareURL, "_blank");
    }
</script>
