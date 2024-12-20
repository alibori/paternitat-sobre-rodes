<x-slot:title>
    {{ __('Blog') }} - {{ \App\Facades\Setting::get('site_name') }}
</x-slot>

<div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-5xl font-bold underline decoration-4 decoration-lime-400 decoration-wavy underline-offset-8">
        {{ __('Blog') }}
    </h1>

    <livewire:posts-list />
</div>
