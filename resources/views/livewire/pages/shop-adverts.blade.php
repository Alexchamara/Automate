<div>
    <main class="listing-main-container">
        <!-- search options -->
        <aside class="listing-main-wrapper">
            <div class="l-filter-container">
                <ul>
                    <li class="l-filter-categories-title">
                        <label for="filter" class="class">
                            <i class="fa-solid fa-filter mr-1"></i>Filters
                        </label>
                        <button type="button" wire:click="resetFilters" wire:loading.attr="disabled">
                            <i class="fa-solid fa-rotate-left mr-1"></i>Reset
                            <x-form-submit-mg />
                        </button>
                    </li>
                    
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="location">Location</label>
                        <div class="l-filter-input">
                            <input type="text" wire:model.live="location" id="location" placeholder="location">
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="make">Name</label>
                        <div class="l-filter-input">
                            <input type="text" 
                                   wire:model.live="makeSearch" 
                                   id="makeSearch" 
                                   placeholder="Type to filter..."
                                   class="mb-2">
                    
                            <select id="make" wire:model.live="make">
                                <option value="DEF">Select Make</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Nissan">Nissan</option>
                                <option value="BMW">BMW</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="Audi">Audi</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Ford">Ford</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="price">Price Range</label>
                        <div class="l-filter-input">
                            <select wire:model.live="startPrice" class="mb-2">
                                <option value="">Min Price</option>
                                @for($price = 0; $price <= 10000000; $price += 500000)
                                    <option value="{{ $price }}">Rs. {{ number_format($price) }}</option>
                                @endfor
                            </select>
                    
                            <select wire:model.live="endPrice">
                                <option value="">Max Price</option>
                                @for($price = 500000; $price <= 10000000; $price += 500000)
                                    <option value="{{ $price }}">Rs. {{ number_format($price) }}</option>
                                @endfor
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="model">Model</label>
                        <div class="l-filter-input">
                            <select id="model" wire:model.live="model">
                                <option value="DEF">Model</option>
                                <option value="COMMANDER">Commander</option>
                                <option value="COMPASS">Compass</option>
                                <option value="GRAND CHEROKEE">Grand Cherokee</option>
                                <option value="LIBERTY">Liberty</option>
                                <option value="PATRIOT">Patriot</option>
                                <option value="WRANGLER">Wrangler</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="registrationYear">Year of registration</label>
                        <div class="l-filter-input">
                            <select name="years" id="years" wire:model.live="registrationYear">
                                <option value="">Select</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="prconditionice">Condition</label>
                        <div class="l-filter-input">
                            <select name="condition" id="condition" wire:model.live="condition">
                                <option value="DEF">Select</option>
                                <option value="brand new">Brand new</option>
                                <option value="reconditioned">Reconditioned</option>
                                <option value="used">Used</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="engine">Engine</label>
                        <div class="l-filter-input">
                            <select id="engine" name="engine" wire:model.live="engine">
                                <option value="DEF">Select</option>
                                <option value="0.6L">0.6L</option>
                                <option value="0.7L">0.7L</option>
                                <option value="0.8L">0.8L</option>
                                <option value="0.9L">0.9L</option>
                                <option value="1.0L">1.0L</option>
                                <option value="1.1L">1.1L</option>
                                <option value="1.2L">1.2L</option>
                                <option value="1.3L">1.3L</option>
                                <option value="1.4L">1.4L</option>
                                <option value="1.5L">1.5L</option>
                                <option value="1.6L">1.6L</option>
                                <option value="1.7L">1.7L</option>
                                <option value="1.8L">1.8L</option>
                                <option value="1.9L">1.9L</option>
                                <option value="2.0L">2.0L</option>
                                <option value="2.2L">2.2L</option>
                                <option value="2.4L">2.4L</option>
                                <option value="2.6L">2.6L</option>
                                <option value="2.8L">2.8L</option>
                                <option value="3.0L">3.0L</option>
                                <option value="3.0L">3.0L</option>
                                <option value="3.5L">3.5L</option>
                                <option value="3.6L">3.6L</option>
                                <option value="4.0L">4.0L</option>
                                <option value="4.5L">4.5L</option>
                                <option value="5.0L">5.0L</option>
                                <option value="5.5L">5.5L</option>
                                <option value="6.0L">6.0L</option>
                                <option value="6.5L">6.5L</option>
                                <option value="7.0L">7.0L</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="fuelType">Fuel type</label>
                        <div class="l-filter-input">
                            <select name="fuelType" id="fuelType" wire:model.live="fuelType">
                                <option value="DEF">Select</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="electric">Electric</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="gas">Gas</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="transmission">Transmission</label>
                        <div class="l-filter-input">
                            <select name="bodyType" id="bodyType" wire:model.live="transmission">
                                <option value="DEF">Select</option>
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                                <option value="Tiptronic">Tiptronic</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </li>
                    <hr class="my-3 border-gray-300">
                    <li class="l-filter-categories">
                        <label for="color">Color</label>
                        <div class="l-filter-input">
                            <select name="carColor" wire:model.live="color">
                                <option value="DEF" class="text-[#a9a9a9]">Select</option>
                                <option value="black">Black</option>
                                <option value="white">White</option>
                                <option value="red">Red</option>
                                <option value="blue">Blue</option>
                                <option value="silver">Silver</option>
                                <option value="gray">Gray</option>
                                <option value="green">Green</option>
                                <option value="yellow">Yellow</option>
                                <option value="orange">Orange</option>
                                <option value="purple">Purple</option>
                                <option value="brown">Brown</option>
                                <option value="gold">Gold</option>
                                <option value="beige">Beige</option>
                                <option value="maroon">Maroon</option>
                            </select>
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
                    <h2 class="text-[#6C757D] dark:text-gray-400 text-[40px] font-bold mb-2">No adverts found</h2>
                    <span class="text-[#6C757D] dark:text-gray-400">We couldn't find any records. Try changing search
                        filters.</span>
                </div>
            @else
                <ul>
                    @foreach ($listings as $listing)
                        <li wire:key="{{ $listing->id }}" class="listing-value-wrapper pl-6">
                            <x-pages.shop.advert-card :listing="$listing" />
                        </li>
                    @endforeach
                </ul>

                {{ $listings->links() }}

            @endif
        </section>


    </main>
</div>
