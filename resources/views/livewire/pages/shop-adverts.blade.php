<div>
    <main class="listing-main-container">
        <!-- search options -->
        <aside class="listing-main-wrapper">
            <div class="l-filter-container">
                <ul>
                    <li class="l-filter-categories-title">
                        <x-text tag="label" for="filter" size="base" color="gray-700" darkColor="gray-300">
                            <i class="fa-solid fa-filter mr-1"></i>Filters
                        </x-text>
                        <button type="button" wire:click="resetFilters" wire:loading.attr="disabled">
                            <i class="fa-solid fa-rotate-left mr-1 dark:text-white"></i>
                            <x-text tag="span" size="base" color="gray-700" darkColor="gray-300">Reset</x-text>
                            <x-form-submit-mg />
                        </button>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="make" size="base" color="gray-700"
                            darkColor="gray-300">Location</x-text>
                        <div class="l-filter-input">
                            <x-text-input type="text" wire:model.live="location" id="location"
                                placeholder="Location..." />
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="make" size="base" color="gray-700"
                            darkColor="gray-300">Name</x-text>
                        <div class="l-filter-input">
                            <x-text-input type="text" wire:model.live="makeSearch" id="makeSearch"
                                placeholder="Type to filter..." class="mb-2" />

                            <x-select wire:model.live="make" id="make" :options="[
                                'DEF' => 'Select Make',
                                'Toyota' => 'Toyota',
                                'Honda' => 'Honda',
                                'Nissan' => 'Nissan',
                                'BMW' => 'BMW',
                                'Mercedes' => 'Mercedes',
                                'Audi' => 'Audi',
                                'Volkswagen' => 'Volkswagen',
                                'Ford' => 'Ford',
                            ]" />
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="price" size="base" color="gray-700" darkColor="gray-300">Price
                            Range</x-text>
                        <div class="l-filter-input">
                            <select wire:model.live="startPrice"
                                class="mb-2 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Min Price</option>
                                @for ($price = 0; $price <= 10000000; $price += 500000)
                                    <option value="{{ $price }}">Rs. {{ number_format($price) }}</option>
                                @endfor
                            </select>

                            <select wire:model.live="endPrice"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Max Price</option>
                                @for ($price = 500000; $price <= 10000000; $price += 500000)
                                    <option value="{{ $price }}">Rs. {{ number_format($price) }}</option>
                                @endfor
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="model" size="base" color="gray-700"
                            darkColor="gray-300">Model</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="model" id="model" :options="[
                                'DEF' => 'Model',
                                'COMMANDER' => 'Commander',
                                'COMPASS' => 'Compass',
                                'GRAND CHEROKEE' => 'Grand Cherokee',
                                'LIBERTY' => 'Liberty',
                                'PATRIOT' => 'Patriot',
                                'WRANGLER' => 'Wrangler',
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="years" size="base" color="gray-700" darkColor="gray-300">Year
                            of registration</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="registrationYear" id="years" :options="[
                                '' => 'Select',
                                ...collect(range(2024, 1975))->mapWithKeys(fn($year) => [$year => $year]),
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="condition" size="base" color="gray-700"
                            darkColor="gray-300">Condition</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="condition" id="condition" :options="[
                                'DEF' => 'Select',
                                'brand new' => 'Brand new',
                                'reconditioned' => 'Reconditioned',
                                'used' => 'Used',
                                'other' => 'Other',
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="engine" size="base" color="gray-700"
                            darkColor="gray-300">Engine</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="engine" id="engine" :options="[
                                'DEF' => 'Select',
                                ...collect([
                                    '0.6',
                                    '0.7',
                                    '0.8',
                                    '0.9',
                                    '1.0',
                                    '1.1',
                                    '1.2',
                                    '1.3',
                                    '1.4',
                                    '1.5',
                                    '1.6',
                                    '1.7',
                                    '1.8',
                                    '1.9',
                                    '2.0',
                                    '2.2',
                                    '2.4',
                                    '2.6',
                                    '2.8',
                                    '3.0',
                                    '3.5',
                                    '3.6',
                                    '4.0',
                                    '4.5',
                                    '5.0',
                                    '5.5',
                                    '6.0',
                                    '6.5',
                                    '7.0',
                                ])->mapWithKeys(fn($size) => [$size . 'L' => $size . 'L']),
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="fuelType" size="base" color="gray-700"
                            darkColor="gray-300">Fuel type</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="fuelType" id="fuelType" :options="[
                                'DEF' => 'Select',
                                'petrol' => 'Petrol',
                                'diesel' => 'Diesel',
                                'electric' => 'Electric',
                                'hybrid' => 'Hybrid',
                                'gas' => 'Gas',
                                'other' => 'Other',
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="transmission" size="base" color="gray-700"
                            darkColor="gray-300">Transmission</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="transmission" id="transmission" :options="[
                                'DEF' => 'Select',
                                'automatic' => 'Automatic',
                                'manual' => 'Manual',
                                'Tiptronic' => 'Tiptronic',
                                'other' => 'Other',
                            ]" />
                        </div>
                    </li>

                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <x-text tag="label" for="color" size="base" color="gray-700"
                            darkColor="gray-300">Color</x-text>
                        <div class="l-filter-input">
                            <x-select wire:model.live="color" id="color" :options="[
                                'DEF' => 'Select',
                                'black' => 'Black',
                                'white' => 'White',
                                'red' => 'Red',
                                'blue' => 'Blue',
                                'silver' => 'Silver',
                                'gray' => 'Gray',
                                'green' => 'Green',
                                'yellow' => 'Yellow',
                                'orange' => 'Orange',
                                'purple' => 'Purple',
                                'brown' => 'Brown',
                                'gold' => 'Gold',
                                'beige' => 'Beige',
                                'maroon' => 'Maroon',
                            ]" />
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- car listings -->
        <section class="listing-container">
            @if ($listings->isEmpty())
                <div class="ud-empty-body w-full flex flex-col items-center justify-center p-8">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] dark:text-gray-400 text-[80px] mb-4"></i>
                    <x-text tag="h2" size="4xl" weight="bold" color="gray-600" darkColor="gray-400"
                        class="mb-2">
                        No adverts found
                    </x-text>
                    <x-text tag="span" size="base" color="gray-600" darkColor="gray-400">
                        We couldn't find any records. Try changing search filters.
                    </x-text>
                </div>
            @else
                <ul>
                    @foreach ($listings as $listing)
                        <li wire:key="{{ $listing->id }}" class="listing-value-wrapper pl-6">
                            <x-pages.shop.advert-card :listing="$listing" :searchTerm="$makeSearch" />
                        </li>
                    @endforeach
                </ul>
                
                <div class="pl-6">
                    {{ $listings->links() }}
                </div>
            @endif
        </section>
    </main>
</div>
