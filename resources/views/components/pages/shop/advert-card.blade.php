<section class="sub-listing-container dark:bg-gray-800 dark:shadow-none">
    <div class="sub-listing-content">
        <div class="sub-listing-content-up">
            <div class="main-img-wrapper">
                @if (isset($listing->advert->images) && !empty($listing->advert->images))
                    @php
                        $images = is_array($listing->advert->images) ? $listing->advert->images : json_decode($listing->advert->images);
                    @endphp
                    @if (is_array($images) && count($images) > 0)
                        <img src="{{ asset('uploads/' . $images[0]) }}" alt="{{ $listing->advert->make }}" class="sub-listing-main-img">
                    @endif
                @else
                    <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image" class="sub-listing-main-img">
                @endif
            </div>
            <div class="sub-listing-info">
                <x-text tag="h2" size="xl" weight="bold" color="gray-800" darkColor="gray-200" class="sub-listing-title">
                    {{ $listing->advert->make }} {{ $listing->advert->model }}
                </x-text>
                <div class="sub-listing-features-container">
                    <div class="sub-listing-features">
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->condition }}
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->registrationYear }}
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->mileage }} km
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->bodyType }}
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->fuelType }}
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->color }}
                        </x-text>
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300" class="sub-listing-feature-value">
                            {{ $listing->advert->engine }}
                        </x-text>
                    </div>
                    <div class="sub-listing-location">
                        <x-text tag="span" size="base" color="gray-600" darkColor="gray-300">
                            <i class="fa-solid fa-map-pin mr-1"></i>
                            {{ $listing->advert->location }}
                        </x-text>
                    </div>
                </div>
            </div>
            <div class="listing-price-label">
                <x-text tag="span" size="lg" weight="bold" color="gray-800" darkColor="gray-200" class="listing-price">
                    Rs.{{ $listing->advert->price }}/=
                </x-text>
            </div>
        </div>

        <div class="sub-listing-content-bottom">
            @php
                $images = [];
                if (isset($listing->advert->images) && !empty($listing->advert->images)) {
                    $images = json_decode($listing->advert->images, true) ?? [];
                }
            @endphp

            @if (count($images) > 3)
                <div class="sub-listing-imgs-table">
                    @foreach (array_slice($images, 1, 6) as $image)
                        <div class="sub-listing-img bg-cover"
                            style="background-image: url('{{ asset('uploads/' . $image) }}')">
                        </div>
                    @endforeach

                    @if (count($images) > 7)
                        <div class="sub-listing-img bg-cover more-images">
                            <x-text tag="span" size="lg" weight="bold" color="white" class="more-count">
                                +{{ count($images) - 7 }}
                            </x-text>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <x-text tag="a" href="#" size="base" color="customBlue" darkColor="blue-400" class="dark:text-white py-[8px] px-[10px] flex justify-end w-full items-center">
        <i class="fa-regular fa-eye mr-1"></i>View advert
    </x-text>
</section>

<style>
    .sub-listing-imgs-table {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 8px;
        margin-top: 10px;
    }

    .sub-listing-img {
        aspect-ratio: 1;
        border-radius: 4px;
        overflow: hidden;
    }

    .more-images {
        position: relative;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .more-count {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
        font-size: 1.2em;
    }
</style>