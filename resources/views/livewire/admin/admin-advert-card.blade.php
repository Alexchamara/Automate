<div>
    <section class="sub-listing-container dark:shadow-none dark:bg-gray-800">
        <div class="sub-listing-content">
            <div class="sub-listing-content-up">
                <div class="main-img-wrapper">
                    @if (isset($listing->advert->images) && !empty($listing->advert->images))
                        @php
                            $images = is_array($listing->advert->images)
                                ? $listing->advert->images
                                : json_decode($listing->advert->images);
                        @endphp
                        @if (is_array($images) && count($images) > 0)
                            <img src="{{ asset('uploads/' . $images[0]) }}" alt="{{ $listing->advert->make }}"
                                class="sub-listing-main-img">
                        @else
                            <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image"
                                class="sub-listing-main-img">
                        @endif
                    @else
                        <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image"
                            class="sub-listing-main-img">
                    @endif
                </div>
                <div class="sub-listing-info">
                    <x-text tag="label" class="sub-listing-title" size="base"
                        weight="medium">{{ $listing->advert->make }}</x-text>
                    <div class="sub-listing-features-container">
                        <div class="sub-listing-features">
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->model }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->registrationYear }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->mileage }} km</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->bodyType }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->fuelType }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->color }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value"
                                size="base">{{ $listing->advert->engine }}</x-text>
                            <x-text tag="label" class="sub-listing-feature-value" size="base">Rs.
                                {{ $listing->advert->price }}/=</x-text>
                        </div>
                        <div class="sub-listing-location">
                            <x-text tag="label" for="location" size="base"><i
                                    class="fa-solid fa-map-pin mr-1"></i>{{ $listing->advert->location }}</x-text>
                        </div>
                    </div>
                </div>
                <div class="listing-price-label mt-3 ">
                    @if ($listing->status === 'approved')
                        @if ($listing->isActive)
                            <x-text tag="label" for="active" size="base" weight="medium" color="white"
                                darkColor="white" class="py-1 px-3 rounded-md" style="background-color: green;">
                                Active Post
                            </x-text>
                        @else
                            <x-text tag="label" for="deactive" size="base" weight="medium" color="white"
                                darkColor="white" class="py-1 px-3 rounded-md" style="background-color: #A82E23;">
                                Deactivated Post
                            </x-text>
                        @endif
                    @elseif($listing->status === 'pendding')
                        <x-text tag="label" for="pending" size="base" weight="medium" color="white"
                            darkColor="white" class="py-1 px-3 rounded-md" style="background-color: rgb(208, 208, 53);">
                            Pending Post
                        </x-text>
                    @elseif($listing->status === 'rejected')
                        <x-text tag="label" for="rejected" size="base" weight="medium" color="white"
                            darkColor="white" class="py-1 px-3 rounded-md" style="background-color: #A82E23;">
                            Rejected Post
                        </x-text>
                    @endif
                </div>
            </div>
            <div class=" my-3" x-data="{ open: false }">
                <div class="bg-customBlue dark:bg-gray-700">
                    <button @click="open = !open" class="flex items-center justify-between w-full text-left px-5 py-1">
                        <x-text tag="label" for="title" class="text-white font-semibold text-xl" size="xl"
                            weight="semibold" color="customBlue">
                            Seller Information
                        </x-text>
                        <i class="fas fa-chevron-down text-white transform transition-transform duration-200"
                            :class="{ 'rotate-180': open }"></i>
                    </button>
                </div>

                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95" class="user-listing-info flex mt-3">
                    <div class="user-info-column px-5">
                        <div class="user-info-tag">
                            <x-text tag="span" size="base">
                                <i class="fa-regular fa-id-card mr-3 text-customBlue dark:text-white"></i>
                                Name: {{ $listing->user->name }}
                            </x-text>
                        </div>
                        <div class="user-info-tag">
                            <x-text tag="span" size="base">
                                <i class="fa-regular fa-envelope mr-3 text-customBlue dark:text-white"></i>
                                Email: {{ $listing->user->email }}
                            </x-text>
                        </div>
                    </div>
                    <div class="user-info-column px-5">
                        <div class="user-info-tag">
                            <x-text tag="span" size="base">
                                <i class="fa-solid fa-mobile-screen-button mr-3 text-customBlue dark:text-white"></i>
                                Mobile: {{ $listing->user->mobile }}
                            </x-text>
                        </div>
                        <div class="user-info-tag">
                            <x-text tag="span" size="base">
                                <i class="fa-regular fa-calendar-days mr-3 text-customBlue dark:text-white"></i>
                                Member since: {{ $listing->user->created_at->format('d M Y') }}
                            </x-text>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <a href="{{ route('listings.show', $listing) }}" class="savedAd-view ">
                    <button class="savedAd-view dark:text-white"><i class="fa-regular fa-eye mr-2"></i>View
                        advert</button></a>
            </div>

            <div class="border-customGray flex">
                <x-form-submit-mg />
                @if (isset($status) && $status !== 'approved' && $status !== 'rejected')
                    <button wire:click="accept" type="submit"
                        class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                        <i class="fa-solid fa-clipboard-check mr-2"></i>Accept Post
                    </button>
                    <button wire:click="reject" type="submit"
                        class="remove-button savedAd-delete border-l dark:text-white">
                        <i class="fa-solid fa-ban mr-2"></i>Reject Post
                    </button>
                @endif

                @if (isset($status) && $status === 'approved')
                    <button wire:click="toggleActiveStatus" type="submit"
                        class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                        <i
                            class="fa-solid fa-toggle-on mr-2"></i>{{ isset($isActive) && $isActive ? 'Deactivate' : 'Activate' }}
                        Post
                    </button>
                @endif
            </div>
        </div>
        <?php
        
        ?>
    </section>
</div>
