<x-layout>
<x-slot:title>
    {{ __('About me') }} - {{ \App\Facades\Setting::get('site_name') }}
</x-slot>

<div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-5xl font-bold underline decoration-4 decoration-lime-400 decoration-wavy underline-offset-8">
        {{ __('About me') }}
    </h1>

    <!-- About -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <p class="text-lg text-gray-800 mb-5">
            {{ __('pages.about.text_1') }}
        </p>


        <p class="text-lg text-gray-800 mb-5">
            {{ __('pages.about.text_2') }}
        </p>


        <p class="text-lg text-gray-800">
            {{ __('pages.about.text_3') }}
        </p>

    </div>
    <!-- End About -->
</div>
</x-layout>
