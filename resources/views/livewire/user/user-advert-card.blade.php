<div>
    <section class="sub-listing-container dark:bg-gray-800">
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
                        </div>
                        <div class="sub-listing-location">
                            <x-text tag="label" for="location" size="base"><i
                                    class="fa-solid fa-map-pin mr-1"></i>{{ $listing->advert->location }}</x-text>
                        </div>
                    </div>
                </div>
                <div class="listing-price-label mt-3 flex flex-col">
                    <div class="pb-2">
                        @if ($listing->status === 'approved')
                            @if ($listing->isActive)
                                <x-text tag="label" for="active" size="base" weight="medium" color="white"
                                    darkColor="white" class="py-1 px-3 rounded-md w-full"
                                    style="background-color: green;">
                                    Active Post
                                </x-text>
                            @else
                                <x-text tag="label" for="deactive" size="base" weight="medium" color="white"
                                    darkColor="white" class="py-1 px-3 rounded-md w-full"
                                    style="background-color: #A82E23;">
                                    Deactivated Post
                                </x-text>
                            @endif
                        @elseif($listing->status === 'pendding')
                            <x-text tag="label" for="pending" size="base" weight="medium" color="white"
                                darkColor="white" class="py-1 px-3 rounded-md w-full"
                                style="background-color: rgb(208, 208, 53);">
                                Pending Post
                            </x-text>
                        @elseif($listing->status === 'rejected')
                            <x-text tag="label" for="rejected" size="base" weight="medium" color="white"
                                darkColor="white" class="py-1 px-3 rounded-md w-full"
                                style="background-color: #A82E23;">
                                Rejected Post
                            </x-text>
                        @endif
                    </div>
                    <label for="vahiclePrice" class="listing-price dark:text-white">Rs.
                        {{ $listing->advert->price }}/=</label>
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <a href="#" class="savedAd-view ">
                    <button class="savedAd-view dark:text-white"><i class="fa-regular fa-eye mr-2"></i>View
                        advert</button></a>
            </div>

            <div class="border-customGray flex">
                <x-form-submit-mg />

                @if (isset($status) && $status === 'approved')
                    <button wire:click="toggleActiveStatus" type="submit"
                        class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                        <i
                            class="fa-solid fa-toggle-on mr-2"></i>{{ isset($isActive) && $isActive ? 'Deactivate' : 'Activate' }}
                        Post
                    </button>
                    {{-- <button type="submit"
                        class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                        <i class="fa-solid fa-pencil mr-2"></i>Update
                    </button> --}}
                    <a href="{{ route('advert.edit', $listing) }}"
                        class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                        <i class="fa-solid fa-pencil mr-2"></i>Update
                    </a>
                    <form action="{{ route('advert.destroy', $listing) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="remove-button savedAd-delete border-l border-customGray dark:text-white">
                            <i class="fa-regular fa-trash-can mr-2"></i>Remove
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <?php
        
        ?>
    </section>

</div>
