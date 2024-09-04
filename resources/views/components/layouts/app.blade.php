<x-layout>
    <x-slot:title>
        {{ $title ?? null }}
    </x-slot>

    <x-slot:description>
        {{ $description ?? null }}
    </x-slot>

    <x-slot:keywords>
        {{ $keywords ?? null }}
    </x-slot>

    {{ $slot }}
</x-layout>
