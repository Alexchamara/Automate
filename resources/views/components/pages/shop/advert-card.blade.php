<section class="sub-listing-container">
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
                        <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image" class="sub-listing-main-img">
                    @endif
                @else
                    <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image" class="sub-listing-main-img">
                @endif
            </div>
            <div class="sub-listing-info">
                <label class="sub-listing-title">{{ $listing->advert->make }}
                    {{ $listing->advert->model }}</label>
                <div class="sub-listing-features-container">
                    <div class="sub-listing-features">
                        <label class="sub-listing-feature-value">{{ $listing->advert->condition }}</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->registrationYear }}</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->mileage }}
                            km</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->bodyType }}</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->fuelType }}</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->color }}</label>
                        <label class="sub-listing-feature-value">{{ $listing->advert->engine }}</label>
                    </div>
                    <div class="sub-listing-location">
                        <label for="location">
                            <i class="fa-solid fa-map-pin mr-1"></i>
                            {{ $listing->advert->location }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="listing-price-label">
                <label for="vahiclePrice" class="listing-price">Rs.{{ $listing->advert->price }}/=</label>
            </div>
        </div>

        <div class="sub-listing-content-bottom">
            <div class="sub-listing-imgs-table">
                @if (isset($listing->advert->images) && !empty($listing->advert->images))
                    @foreach (array_slice($images, 1, 6) as $image)
                        <div class="sub-listing-img bg-cover"
                            style="background-image: url('{{ asset('uploads/' . $image) }}')">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <a href="#" class="text-customBlue py-[8px] px-[10px] flex justify-end w-full items-center">
        <i class="fa-regular fa-eye mr-1"></i>View advert
    </a>
</section>
