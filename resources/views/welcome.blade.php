<x-layout>
    <div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Intro -->
        <h1 class="text-8xl font-bold underline decoration-4 decoration-lime-400 decoration-wavy underline-offset-8">
            {{ __('pages.home.intro.greeting') }}
        </h1>

        <p class="mt-5 text-lg text-gray-800">
            {{ __('pages.home.intro.text_1') }}
        </p>

        <p class="mt-5 text-lg text-gray-800">
            {{ __('pages.home.intro.text_2') }}
        </p>

        <p class="mt-5 text-lg text-gray-800">
            {{ __('pages.home.intro.text_3') }}
        </p>
        <!-- End Intro -->

        <!-- List -->
        <h2 class="mt-24 text-5xl font-bold underline decoration-4 decoration-lime-400 decoration-wavy underline-offset-8">
            {{ __('Last posts') }}
        </h2>

        <livewire:posts-list :last="true" />
        <!-- End List -->
    </div>
</x-layout>
