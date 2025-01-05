@extends('layouts.app')
@section('pages')
    <!-- Pricing -->
    <div class="max-w-[85rem] mt-[10%] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Promote your Ad</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Make your ads stand out and receive up to 10x more responses by applying paid promotions.</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="mt-12 grid sm:grid-cols-1 lg:grid-cols-3 gap-6 lg:items-center">
            <!-- Card -->
            <div class="flex flex-col border border-gray-200 text-center rounded-xl p-8 dark:border-gray-700">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Listing Fee</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">Rs.</span>
                    2,500
                </span>
                <p class="mt-2 text-sm text-gray-500">
                    Pay a one-time fee to list your ad on the top of the search results. (1 month)
                <p>

                <a href="{{ route('checkout', ['plan' => 'price_1QdYlXFJ6WA2VB9ngMGUEGVi', 'listing_id' => $listing->id]) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-100 text-indigo-800 hover:bg-indigo-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-indigo-900 dark:text-indigo-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Continue with Listing Fee
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div
                class="flex flex-col border-2 border-indigo-600 text-center shadow-xl rounded-xl p-8 dark:border-indigo-700">
                <p class="mb-3"><span
                        class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-lg text-xs uppercase font-semibold bg-indigo-100 text-indigo-800 dark:bg-indigo-600 dark:text-white">
                        Most popular</span></p>
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Daily Bump Up</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">Rs.</span>
                    3,200
                </span>
                <p class="mt-2 text-sm text-gray-500">
                    Bump up your ad daily and stay on top of the search results. (3 months)
                </p>

                <a href="{{ route('checkout', ['plan' => 'price_1QdYo8FJ6WA2VB9nGPfkfu45', 'listing_id' => $listing->id]) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Continue with Daily Bump Up
                </a>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col border border-gray-200 text-center rounded-xl p-8 dark:border-gray-700">
                <h4 class="font-medium text-lg text-gray-800 dark:text-gray-200">Urgent</h4>
                <span class="mt-5 font-bold text-5xl text-gray-800 dark:text-gray-200">
                    <span class="font-bold text-2xl -me-2">Rs.</span>
                    4,500
                </span>
                <p class="mt-2 text-sm text-gray-500">
                    Highlight your ad and make it stand out. (1 week)
                </p>

                <a href="{{ route('checkout', ['plan' => 'price_1QdYo8FJ6WA2VB9nXBRlfhk9', 'listing_id' => $listing->id]) }}"
                    class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-100 text-indigo-800 hover:bg-indigo-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-indigo-900 dark:text-indigo-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Continue with Urgent
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Pricing -->
@endsection
