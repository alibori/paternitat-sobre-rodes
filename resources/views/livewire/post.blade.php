<x-slot:title>
    {{ $post->title }} - {{ config('app.name') }}
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
                                <svg class="size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                                {{ __('Tweet') }}
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
