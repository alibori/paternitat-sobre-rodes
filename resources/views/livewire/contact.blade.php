<x-slot:title>
    {{ __('Contact me') }} - {{ config('app.name') }}
</x-slot>

<div class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-5xl font-bold underline decoration-4 decoration-lime-400 decoration-wavy underline-offset-8">
        {{ __('Contact me') }}
    </h1>

    <!-- Contact Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="w-full mx-auto">

            <!-- Card -->
            <div class="flex flex-col bg-white border rounded-xl p-4 sm:p-6 lg:p-8">
                <h2 class="mb-8 text-xl font-semibold text-gray-800">
                    {{ __('Fill in the form') }}
                </h2>

                <form>
                    <div class="grid gap-4">
                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="hs-firstname-contacts-1" class="sr-only">{{ __('First Name') }}</label>
                                <input type="text" name="hs-firstname-contacts-1" id="hs-firstname-contacts-1"
                                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                       placeholder="{{ __('First Name') }}">
                            </div>

                            <div>
                                <label for="hs-lastname-contacts-1" class="sr-only">{{ __('Last Name') }}</label>
                                <input type="text" name="hs-lastname-contacts-1" id="hs-lastname-contacts-1"
                                       class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                       placeholder="{{ __('Last Name') }}">
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div>
                            <label for="hs-email-contacts-1" class="sr-only">{{ __('Email') }}</label>
                            <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1" autocomplete="email"
                                   class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   placeholder="{{ __('Email') }}">
                        </div>

                        <div>
                            <label for="hs-about-contacts-1" class="sr-only">{{ __('Message') }}</label>
                            <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4"
                                      class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                      placeholder="{{ __('Hello!') }}"></textarea>
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-4 grid">
                        <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-lime-400 text-white hover:bg-lime-600 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                            {{ __('Send') }}</button>
                    </div>

                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-500">
                            {{ __('I\'ll get back to you as soon as possible.') }}
                        </p>
                    </div>
                </form>
            </div>
            <!-- End Card -->

        </div>
    </div>
    <!-- End Contact Us -->
</div>
