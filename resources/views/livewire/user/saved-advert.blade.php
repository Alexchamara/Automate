<div>
    <x-search-bar :text="'Status'" :options="['all' => 'All', 'active' => 'Live', 'expired' => 'Expired']" :keyword="request('keyword', '')" :placeholder="'Search adverts by name or location...'" />

    @forelse($savedAdverts as $favorite)
        <section class="savedAd-listing-container dark:bg-gray-800">
            <div class="sub-listing-content">
                <div class="savedAd-listing-wrapper">
                    <div class="savedAd-img">
                        @php
                            $images = json_decode($favorite->listing->advert->images, true) ?? [];
                            $firstImage = !empty($images) ? $images[0] : 'default.jpg.webp';
                        @endphp
                        <img src="{{ asset('uploads/' . $firstImage) }}" alt=""
                            class="savedimg object-cover w-full h-full">
                    </div>
                    <div class="savedAd-details">
                        <div class="savedAd-title">
                            <x-text tag="h3" size="3xl" weight="semibold" color="customBlue">
                                {{ $favorite->listing->advert->make }} {{ $favorite->listing->advert->model }}
                            </x-text>
                        </div>
                        <div class="savedAd-price">
                            <x-text tag="span" size="lg" weight="bold" color="customRed">
                                Rs. {{ number_format($favorite->listing->advert->price) }}
                            </x-text>
                        </div>
                        <div class="flex items-baseline">
                            <div class="savedAd-location">
                                <x-text tag="span" size="base">
                                    <i
                                        class="fa-solid fa-map-pin mr-1 dark:text-white"></i>{{ $favorite->listing->advert->location }}
                                </x-text>
                            </div>
                            <div class="ml-5">
                                <x-text tag="span" size="base" color="gray-600" darkColor="gray-300">
                                    <i class="fa-regular fa-clock mr-1 text-blue-400"></i>
                                    {{ $favorite->created_at->diffForHumans() }}
                                </x-text>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="savedAd-buttons">
                    <div class="border-r border-customGray">
                        <x-text tag="a" href="{{ route('listings.show', $favorite->listing->id) }}"
                            size="base" color="customBlue" class="savedAd-view">
                            <i class="fa-regular fa-eye mr-1 dark:text-white"></i>View advert
                        </x-text>
                    </div>
                    <div class="border-l border-customGray">
                        <button wire:click="removeFavorite({{ $favorite->listing->id }})" class="savedAd-delete">
                            <x-text tag="span" size="base" color="customBlue">
                                <i class="fa-regular fa-trash-can mr-1 dark:text-white"></i>Unsave
                            </x-text>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @empty
        <div class="ud-empty-body flex flex-col items-center justify-center gap-4 py-10">
            <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
            <x-text tag="h2" size="4xl" weight="bold" color="[#6C757D]">No saved adverts found</x-text>
            <x-text tag="span" color="[#6C757D]">We couldn't find any records. Try changing search filters</x-text>
            <a href="{{ route('pages.shop') }}"
                class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">
                Show latest adverts
            </a>
        </div>
    @endforelse
</div>
