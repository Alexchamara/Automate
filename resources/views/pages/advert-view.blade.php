@extends('layouts.app')
@section('pages')
    <div class="my-[11%] mx-[7%]">
        <div class="flex flex-col md:flex-row justify-between">

            <div class="text-base text-customBlue mb-4">
                <a href="{{ url()->previous() }}" class="text-customBlue"
                    onclick="event.preventDefault(); handleBackNavigation('{{ url()->previous() }}', '{{ Route::currentRouteName() }}')">
                    <i class="fa-solid fa-arrow-left text-customBlue mr-2 dark:text-white"></i>
                    <x-text size="base" color="customBlue">Back to search</x-text>
                </a>
            </div>

            <!-- Sign out btn -->
            <div class="flex justify-end gap-8 text-sm mb-4">
                <a href="#" class="text-customBlue favorite-btn" data-listing="{{ $listing->id }}"
                    onclick="event.preventDefault(); toggleFavorite(this)">
                    <i
                        class="fa-heart mr-2 dark:text-white {{ Auth::check() &&Auth::user()->favorites()->where('listing_id', $listing->id)->exists()? 'fas': 'far' }}"></i>
                    <x-text size="sm" color="customBlue">
                        {{ Auth::check() &&Auth::user()->favorites()->where('listing_id', $listing->id)->exists()? 'Saved': 'Save' }}
                    </x-text>
                </a>

                <div class="relative" x-data="{ open: false }">
                    <a href="#" class="text-customBlue transition-colors duration-200 hover:text-customBlue/80"
                        @click.prevent="open = !open" @mouseover="open = true"
                        @mouseleave="setTimeout(() => { if (!$el.contains(document.activeElement)) open = false }, 200)">
                        <i class="fa-solid fa-share-nodes mr-2 dark:text-white"></i>
                        <x-text size="sm" color="customBlue">Share</x-text>
                    </a>

                    <!-- Share options dropdown -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95" @mouseover="open = true"
                        @mouseleave="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 dark:bg-gray-800">
                        <div class="py-1">
                            <!-- Facebook -->
                            <a href="#"
                                onclick="shareOn('facebook', '{{ route('listings.show', $listing->id) }}', '{{ $listing->advert->make }} {{ $listing->advert->model }}')"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                                <i class="fab fa-facebook-f w-5 mr-2"></i> Facebook
                            </a>

                            <!-- Twitter/X -->
                            <a href="#"
                                onclick="shareOn('twitter', '{{ route('listings.show', $listing->id) }}', '{{ $listing->advert->make }} {{ $listing->advert->model }}')"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                                <i class="fab fa-x-twitter w-5 mr-2"></i> Twitter
                            </a>

                            <!-- WhatsApp -->
                            <a href="#"
                                onclick="shareOn('whatsapp', '{{ route('listings.show', $listing->id) }}', '{{ $listing->advert->make }} {{ $listing->advert->model }}')"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                                <i class="fab fa-whatsapp w-5 mr-2"></i> WhatsApp
                            </a>

                            <!-- Copy Link -->
                            <button onclick="copyToClipboard('{{ route('listings.show', $listing->id) }}')"
                                class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                                <i class="fas fa-link w-5 mr-2"></i> Copy Link
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="ad-top-preview flex flex-col md:flex-row gap-4 items-start  bg-center bg-cover bg-no-repeat">

            <!-- Slider -->
            {{-- <div class="ad-image-slider w-full md:w-1/2">
            <div class="slider-container relative w-full overflow-hidden">
                <div class="slider flex w-full">
                    <div class="slides flex transition-transform duration-500 ease-in-out">

                        <!-- Slider images -->
                        <img src="" alt="Image 1" class="w-full h-auto">
                        <img src="<?= $listing['images'] ?>" alt="main image" class="sub-listing-main-img">
                        <img src="img/about_main.jpg" alt="Image 2" class="w-full h-auto">
                        <img src="img/home-main.jpg" alt="Image 3" class="w-full h-auto">
                        <img src="img/about_main.jpg" alt="Image 4" class="w-full h-auto">

                        <?php if (empty($car['images'])): ?>
                        <img src="img/placeholder.jpg" alt="placeholder image" class="w-full h-auto">
                        <?php else: ?>
                        <?php foreach (explode(',', $car['images']) as $image): ?>
                        <img src="<?= $image ?>" alt="Image" class="w-full h-auto">
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <!-- Navigation buttons -->
                <button class="prev-btn"
                    style="position: absolute; top: 50%; transform: translateY(-50%);background-color: rgba(0, 0, 0, 0.5);color: white;border: none;padding: 10px;cursor: pointer"
                    onclick="prevSlide()">&#10094;</button>
                <button class="next-btn"
                    style="position: absolute; top: 50%; transform: translateY(-50%);background-color: rgba(0, 0, 0, 0.5);color: white;border: none;padding: 10px;cursor: pointer"
                    onclick="nextSlide()">&#10095;</button>
            </div>
            <div class="thumbnails-container flex w-full mt-2">
                <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden"
                    id="scroll-left" onclick="scrollThumbnails('left')">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="thumbnails flex overflow-x-auto scroll-smooth w-full">
                    <img src="img/home-main.jpg" alt="Thumbnail 1" class="flex-none w-24 mr-2"
                        onclick="currentSlide(1)">
                    <img src="img/home-main.jpg" alt="Thumbnail 2" class="flex-none w-24 mr-2"
                        onclick="currentSlide(2)">
                    <img src="image3.jpg" alt="Thumbnail 3" class="flex-none w-24 mr-2" onclick="currentSlide(3)">
                    <img src="image4.jpg" alt="Thumbnail 4" class="flex-none w-24 mr-2" onclick="currentSlide(4)">
                    <img src="image5.jpg" alt="Thumbnail 5" class="flex-none w-24 mr-2" onclick="currentSlide(5)">
                    <img src="image6.jpg" alt="Thumbnail 6" class="flex-none w-24 mr-2" onclick="currentSlide(6)">
                    <img src="image7.jpg" alt="Thumbnail 7" class="flex-none w-24 mr-2" onclick="currentSlide(7)">
                    <img src="image8.jpg" alt="Thumbnail 8" class="flex-none w-24 mr-2" onclick="currentSlide(8)">
                </div>
                <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden"
                    id="scroll-right" onclick="scrollThumbnails('right')">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div> --}}
            <div class="ad-image-slider w-full md:w-1/2">
                <div class="slider-container relative w-full overflow-hidden">
                    <div class="slider flex w-full">
                        <div class="slides flex transition-transform duration-500 ease-in-out">
                            @php
                                $images = [];
                                if (isset($listing->advert->images) && !empty($listing->advert->images)) {
                                    $images = json_decode($listing->advert->images, true) ?? [];
                                }
                            @endphp

                            @if (count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <img src="{{ asset('uploads/' . $image) }}" alt="Image {{ $index + 1 }}"
                                        class="w-full h-auto">
                                @endforeach
                            @else
                                <img src="{{ asset('assets/default.jpg.webp') }}" alt="Default Image"
                                    class="w-full h-auto">
                            @endif
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <button class="prev-btn"
                        style="position: absolute; top: 50%; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; padding: 10px; cursor: pointer"
                        onclick="prevSlide()">
                        &#10094;
                    </button>
                    <button class="next-btn"
                        style="position: absolute; top: 50%; right: 0; transform: translateY(-50%); background-color: rgba(0, 0, 0, 0.5); color: white; border: none; padding: 10px; cursor: pointer"
                        onclick="nextSlide()">
                        &#10095;
                    </button>
                </div>

                <div class="thumbnails-container flex w-full mt-2">
                    <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden"
                        id="scroll-left" onclick="scrollThumbnails('left')">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>

                    <div class="thumbnails flex overflow-x-auto scroll-smooth w-full">
                        @if (count($images) > 0)
                            @foreach ($images as $index => $image)
                                <img src="{{ asset('uploads/' . $image) }}" alt="Thumbnail {{ $index + 1 }}"
                                    class="flex-none w-24 mr-2 cursor-pointer hover:opacity-75 transition-opacity"
                                    onclick="currentSlide({{ $index + 1 }})">
                            @endforeach
                        @endif
                    </div>

                    <button class="scroll-button bg-gray-500 text-white border-none p-2 cursor-pointer hidden"
                        id="scroll-right" onclick="scrollThumbnails('right')">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Ad Details -->
            <div class="pt-0 pb-4 px-4 md:pt-0 md:pb-4 md:px-4 w-full md:w-1/2 flex flex-col gap-5">

                <!-- Title Section -->
                <div class="pb-5">
                    <x-text tag="h1" size="4xl" weight="bold" color="blue-900"
                        class="mb-2">{{ $listing->advert->make }}</x-text>
                    <x-text size="base" color="gray-500">
                        {{ $listing->advert->make }} |
                        {{ $listing->advert->model }} |
                        {{ $listing->advert->registrationYear }}
                    </x-text>
                </div>

                <!-- Price Section -->
                <div class="flex flex-col md:flex-row justify-between items-center border-y border-gray-200 py-5">
                    <x-text size="3xl" weight="bold" color="customRed">Rs.{{ $listing->advert->price }}/=</x-text>
                    <div class="flex items-center space-x-2 mt-2 md:mt-0"> <i
                            class="fa-regular fa-circle-check w-5 h-5 text-green-500"></i>
                        <x-text size="base" color="green-500">Verified Ad</x-text>
                    </div>
                </div>

                <!-- Seller Details Section -->
                <div class="pt-5">
                    <x-text tag="h2" size="2xl" weight="semibold" color="gray-600">Seller details</x-text>
                    @auth
                    @else
                        <x-text tag="span" size="base" color="customBlue" onclick="promptLogin()">
                            Sign in to see the details
                        </x-text>
                    @endauth
                    <div class="mt-5 flex flex-col space-y-2">
                        <!-- Phone Number -->
                        <div class="flex flex-col md:flex-row text-customBlue space-y-2 md:space-y-0 md:space-x-4">
                            <div class="flex items-center basis-1/2 pb-4">
                                <i class="fa-solid fa-mobile-screen dark:text-white"></i>
                                @if (Auth::check())
                                    <x-text tag="a" href="tel:{{ $listing->advert->contactNumber }}"
                                        size="base" color="customBlue" class="ml-2">
                                        {{ $listing->advert->contactNumber }}
                                    </x-text>
                                @else
                                    <x-text tag="a" href="tel:{{ $listing->advert->contactNumber }}"
                                        size="base" color="customBlue" class="ml-2">
                                        {{ substr($listing->advert->contactNumber, 0, 3) }}*******
                                        <br>
                                    </x-text>
                                @endif
                            </div>
                            <div class="flex items-center pb-4">
                                <i class="fa-regular fa-envelope dark:text-white"></i>
                                @auth
                                    <x-text tag="a" href="mailto:{{ $listing->advert->advertEmail }}" size="base"
                                        color="customBlue" class="ml-2">
                                        {{ $listing->advert->advertEmail }}
                                    </x-text>
                                @else
                                    <x-text tag="span" size="base" color="customBlue" class="ml-2"
                                        onclick="promptLogin()">
                                        {{ substr($listing->advert->advertEmail, 0, 4) }}****@gmail.com
                                    </x-text>
                                @endauth
                            </div>
                        </div>

                        <!-- Send Message -->
                        <div class="flex flex-col md:flex-row text-customBlue space-y-2 md:space-y-0 md:space-x-4">
                            <div class="flex items-center basis-1/2 pb-4">
                                <i class="fa-regular fa-comment dark:text-white"></i>
                                @auth
                                    <x-text tag="a" href="mailto:{{ $listing->advert->advertEmail }}" size="base"
                                        color="customBlue" class="ml-2">
                                        Send message
                                    </x-text>
                                @else
                                    <x-text tag="span" size="base" color="customBlue" class="ml-2"
                                        onclick="promptLogin()">
                                        Send message
                                    </x-text>
                                @endauth
                            </div>
                            <div class="flex items-center pb-4">
                                <i class="fa-regular fa-message dark:text-white"></i>
                                @auth
                                    <x-text tag="a" href="mailto:{{ $listing->advert->advertEmail }}" size="base"
                                        color="customBlue" class="ml-2">
                                        Chat now
                                    </x-text>
                                @else
                                    <x-text tag="span" size="base" color="customBlue" class="ml-2"
                                        onclick="promptLogin()">
                                        Chat now
                                    </x-text>
                                @endauth
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row text-customBlue space-y-2 md:space-y-0 md:space-x-4">
                            <div class="flex items-center basis-1/2 pb-4">
                                <i class="fa-solid fa-location-crosshairs dark:text-white"></i>
                                <x-text tag="span" size="base" color="customBlue" class="ml-2">
                                    {{ $listing->advert->location }}
                                </x-text>
                            </div>
                            <div class="flex items-center pb-4">
                                <i class="fa-solid fa-route dark:text-white"></i>
                                @auth
                                    <x-text tag="a" size="base" color="customBlue" class="ml-2 cursor-pointer"
                                        onclick="getDirections(event, '{{ $listing->advert->location }}')">
                                        <span id="directionText">Get Directions</span>
                                        <i id="directionLoader" class="fa-solid fa-spinner animate-spin ml-2 hidden"></i>
                                    </x-text>
                                @else
                                    <x-text tag="span" size="base" color="customBlue" class="ml-2"
                                        onclick="promptLogin()">
                                        Directions
                                    </x-text>
                                @endauth
                            </div>
                        </div>
                    </div>

                    <!-- Contact Button -->
                    <div class="mt-6">
                        @auth
                            <button
                                class="w-full rounded-full bg-customRed hover:bg-red-600 text-xl text-white py-2 px-4 font-normal">
                                <a href="tel:{{ $listing->advert->contactNumber }}">Contact seller</a>
                            </button>
                        @else
                            <button onclick="promptLogin()"
                                class="w-full rounded-full bg-customRed hover:bg-red-600 text-xl text-white py-2 px-4 font-normal">
                                <span>Contact seller</span>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="py-14"> <span class="p-4 font-semibold text-2xl text-gray-600">Summary</span>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full md:w-1/2">
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/condition.svg') }}" alt="condition" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->condition) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/meeter.svg') }}" alt="mileage" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->mileage) }} km
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    {{-- <div x-data="{
                        isDark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                        toggleDarkMode() {
                            this.isDark = !this.isDark;
                            localStorage.theme = this.isDark ? 'dark' : 'light';
                            document.documentElement.classList.toggle('dark', this.isDark);
                        }
                        }" x-init="document.documentElement.classList.toggle('dark', isDark)">
                        <img x-show="!isDark" src="{{ asset('assets/color.svg') }}" alt="condition"
                            class="w-9 transition-opacity duration-300">
                        <img x-show="isDark" src="{{ asset('assets/color-dark.svg') }}" alt="condition"
                            class="w-9 transition-opacity duration-300" x-cloak>
                    </div> --}}
                    <img src="{{ asset('assets/registration.svg') }}" alt="registrationYear" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->registrationYear) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/gearbox.svg') }}" alt="transmission" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->transmission) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/engin.svg') }}" alt="engine" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->engine) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/model.svg') }}" alt="model" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->model) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/fuel.svg') }}" alt="fuel" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->fuelType) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/door.svg') }}" alt="door" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->bodyType) }}
                    </x-text>
                </div>
                <div class="flex items-center p-4 font-semibold">
                    <img src="{{ asset('assets/color.svg') }}" alt="color" class="w-9">
                    <x-text size="base" color="customBlue" class="ml-2">
                        {{ ucfirst($listing->advert->color) }}
                    </x-text>
                </div>
            </div>
        </div> <!-- Description -->
        <div class="pb-14">
            <x-text size="2xl" color="customBlue" class="ml-2">
                Description
            </x-text>
            <div class="p-4 text-customBlue">
                <x-text size="base" color="customBlue">
                    {{ $listing->advert->description }}
                </x-text>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Get directions
        function getDirections(event, destination) {
            event.preventDefault();

            const directionText = document.getElementById('directionText');
            const directionLoader = document.getElementById('directionLoader');

            directionText.textContent = 'Getting location...';
            directionLoader.classList.remove('hidden');

            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const {
                        latitude,
                        longitude
                    } = position.coords;
                    const mapsUrl =
                        `https://maps.google.com/maps?saddr=${latitude},${longitude}&daddr=${encodeURIComponent(destination)}`;
                    window.open(mapsUrl, '_blank');

                    directionText.textContent = 'Get Directions';
                    directionLoader.classList.add('hidden');
                }, function(error) {
                    alert('Error getting your location. Please try again.');
                    directionText.textContent = 'Get Directions';
                    directionLoader.classList.add('hidden');
                });
            } else {
                alert('Geolocation is not supported by your browser');
                directionText.textContent = 'Get Directions';
                directionLoader.classList.add('hidden');
            }
        }

        //imgae slider in product page
        let currentSlideIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = slides.children.length;

        function showSlide(index) {
            slides.style.transform = `translateX(${-index * 100}%)`;
            currentSlideIndex = index;
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
            showSlide(currentSlideIndex);
        }

        function prevSlide() {
            currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentSlideIndex);
        }

        function currentSlide(index) {
            showSlide(index - 1);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelector('.thumbnails');
            const scrollLeftButton = document.getElementById('scroll-left');
            const scrollRightButton = document.getElementById('scroll-right');
            const thumbnailImages = thumbnails.querySelectorAll('img');
            if (thumbnailImages.length > 6) {
                scrollLeftButton.style.display = 'block';
                scrollRightButton.style.display = 'block';
            }
            window.scrollThumbnails = function(direction) {
                const scrollAmount = 200;
                // Adjust the scroll amount as needed 
                if (direction === 'left') {
                    thumbnails.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                } else if (direction === 'right') {
                    thumbnails.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            }
        });
        // Prompt login
        function promptLogin() {
            alert('Please log in to perform this action.');
        }

        // Toggle favorite
        function toggleFavorite(element) {
            if (!{{ Auth::check() ? 'true' : 'false' }}) {
                window.location.href = '{{ route('login') }}';
                return;
            }

            const listingId = element.dataset.listing;

            fetch(`/listings/${listingId}/favorite`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const icon = element.querySelector('i');
                    const text = element.querySelector('x-text');

                    if (data.status === 'added') {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        text.textContent = 'Saved';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        text.textContent = 'Save';
                    }
                });
        }

        // Share function
        function shareOn(platform, url, title) {
            const shareUrls = {
                facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
                twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`,
                whatsapp: `https://api.whatsapp.com/send?text=${encodeURIComponent(title + ' ' + url)}`
            };

            const shareUrl = shareUrls[platform];
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                // Show success message
                const notification = document.createElement('div');
                notification.textContent = 'Link copied to clipboard!';
                notification.className =
                    'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg';
                document.body.appendChild(notification);

                // Remove notification after 2 seconds
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        }

        // Handle back navigation
        function handleBackNavigation(previousUrl, currentRoute) {
            // Check if coming from dashboard
            if (previousUrl.includes('dashboard')) {
                window.location.href = previousUrl;
                // Set session to open saved adverts tab
                localStorage.setItem('openTab', 'savedAdverts');
            } else {
                window.location.href = previousUrl;
            }
        }
    </script>
@endsection
