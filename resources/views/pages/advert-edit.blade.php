@extends('layouts.app')
@section('pages')
    <main class="advert-main-container">
        <x-form-submit-mg />

        <!-- Progress bar -->
        <div class="progress-bar-container">
            <div class="progress-bar">
                <div class="step active" style="border-radius: 10px 0 0 0;">
                    <span class="step-number">1</span>
                    Vehicle details
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    Your advert
                </div>
                <div class="step" style="border-radius: 0 10px 0 0;">
                    <span class="step-number">3</span>
                    Review & publish
                </div>
            </div>
            <div class="progress-line">
                <div class="progress"></div>
            </div>
        </div>

        <form action="{{ route('advert.update', $listing) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-step active form_1 pt-5">
                <x-text tag="h2" size="2xl" weight="bold">Make & model</x-text>
                <div class="sec-box">
                    <!-- Make -->
                    <div class="col-left">
                        <x-text tag="label" for="make" class="required">Make</x-text><br>
                        <x-select name="make" id="make" :value="old('make', $listing->advert->make)" class="dark:border-white"
                            :options="[
                                '' => old('make', $listing->advert->make) ?? 'Select',
                                'ACURA' => 'Acura',
                                'ASTON MARTIN' => 'Aston Martin',
                                'AUDI' => 'Audi',
                                'BENTLEY' => 'Bentley',
                                'BMW' => 'BMW',
                                'BUICK' => 'Buick',
                                'CADILLAC' => 'Cadillac',
                                'CHEVROLET' => 'Chevrolet',
                                'CHRYSLER' => 'Chrysler',
                                'DODGE' => 'Dodge',
                                'FERRARI' => 'Ferrari',
                                'FORD' => 'Ford',
                                'GMC' => 'GMC',
                                'HONDA' => 'Honda',
                                'HUMMER' => 'Hummer',
                                'HYUNDAI' => 'Hyundai',
                                'INFINITI' => 'Infiniti',
                                'ISUZU' => 'Isuzu',
                                'JAGUAR' => 'Jaguar',
                                'JEEP' => 'Jeep',
                                'KIA' => 'Kia',
                                'LAMBORGHINI' => 'Lamborghini',
                                'LAND ROVER' => 'Land Rover',
                                'LEXUS' => 'Lexus',
                                'LINCOLN' => 'Lincoln',
                                'LOTUS' => 'Lotus',
                                'MASERATI' => 'Maserati',
                                'MAYBACH' => 'Maybach',
                                'MAZDA' => 'Mazda',
                                'MERCEDES-BENZ' => 'Mercedes-Benz',
                                'MERCURY' => 'Mercury',
                                'MINI' => 'Mini',
                                'MITSUBISHI' => 'Mitsubishi',
                                'NISSAN' => 'Nissan',
                                'PONTIAC' => 'Pontiac',
                                'PORSCHE' => 'Porsche',
                                'ROLLS-ROYCE' => 'Rolls-Royce',
                                'SAAB' => 'Saab',
                                'SATURN' => 'Saturn',
                                'SUBARU' => 'Subaru',
                                'SUZUKI' => 'Suzuki',
                                'TOYOTA' => 'Toyota',
                                'VOLKSWAGEN' => 'Volkswagen',
                                'VOLVO' => 'Volvo',
                            ]" />
                        <x-input-error :messages="$errors->get('make')" />
                    </div>
                    <!-- Model -->
                    <div class="col-right">
                        <x-text tag="label" for="model" class="required">Model</x-text><br>
                        <x-select id="model" name="model" :value="old('make', $listing->advert->model)" :options="[
                            '' => old('make', $listing->advert->model) ?? 'Select',
                            'COMMANDER' => 'Commander',
                            'COMPASS' => 'Compass',
                            'GRAND CHEROKEE' => 'Grand Cherokee',
                            'LIBERTY' => 'Liberty',
                            'PATRIOT' => 'Patriot',
                            'WRANGLER' => 'Wrangler',
                        ]" />
                        <x-input-error :messages="$errors->get('model')" />
                    </div>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Age, mileage & other</x-text>
                <div class="sec-box">
                    <!-- Registration year -->
                    <div class="col-left">
                        <x-text tag="label" for="year" class="required">Year of registration</x-text><br>
                        <x-select name="registrationYear" :value="old('make', $listing->advert->registrationYear)" id="years" :options="[
                            '' => old('make', $listing->advert->registrationYear) ?? 'Select',
                            '2025' => '2025',
                            '2024' => '2024',
                            '2023' => '2023',
                            '2022' => '2022',
                            '2021' => '2021',
                            '2020' => '2020',
                            '2019' => '2019',
                            '2018' => '2018',
                            '2017' => '2017',
                            '2016' => '2016',
                            '2015' => '2015',
                            '2014' => '2014',
                            '2013' => '2013',
                            '2012' => '2012',
                            '2011' => '2011',
                            '2010' => '2010',
                            '2009' => '2009',
                            '2008' => '2008',
                            '2007' => '2007',
                            '2006' => '2006',
                            '2005' => '2005',
                            '2004' => '2004',
                            '2003' => '2003',
                            '2002' => '2002',
                            '2001' => '2001',
                            '2000' => '2000',
                            '1999' => '1999',
                            '1998' => '1998',
                            '1997' => '1997',
                            '1996' => '1996',
                            '1995' => '1995',
                            '1994' => '1994',
                            '1993' => '1993',
                            '1992' => '1992',
                            '1991' => '1991',
                            '1990' => '1990',
                            '1989' => '1989',
                            '1988' => '1988',
                            '1987' => '1987',
                            '1986' => '1986',
                            '1985' => '1985',
                            '1984' => '1984',
                            '1983' => '1983',
                            '1982' => '1982',
                            '1981' => '1981',
                            '1980' => '1980',
                            '1979' => '1979',
                            '1978' => '1978',
                            '1977' => '1977',
                            '1976' => '1976',
                            '1975' => '1975',
                        ]" />
                        <x-input-error :messages="$errors->get('registrationYear')" />
                    </div>
                    <!-- Mileage -->
                    <div class="col-right">
                        <x-text tag="label" for="mileage" class="required">Current mileage</x-text><br>
                        <x-text-input type="text" name="mileage" :value="old('make', $listing->advert->mileage)" id="mileage"
                            placeholder="e.g. 50000" class="mt-1" />
                        <x-input-error :messages="$errors->get('mileage')" />
                    </div>
                    <!-- Condition -->
                    <div class="col-left">
                        <x-text tag="label" for="condition" class="required">Condition</x-text><br>
                        <x-select name="condition" id="condition" :value="old('make', $listing->advert->condition)" :options="[
                            '' => old('make', $listing->advert->condition) ?? 'Select',
                            'brand new' => 'Brand new',
                            'reconditioned' => 'Reconditioned',
                            'used' => 'Used',
                            'other' => 'Other',
                        ]" />
                        <x-input-error :messages="$errors->get('condition')" />
                    </div>
                    <!-- Engine -->
                    <div class="col-right">
                        <x-text tag="label" for="engine" class="required">Engine</x-text><br>
                        <x-select id="engine" name="engine" :value="old('make', $listing->advert->engine)" :options="[
                            '' => old('make', $listing->advert->engine) ?? 'Select',
                            '0.6L' => '0.6L',
                            '0.7L' => '0.7L',
                            '0.8L' => '0.8L',
                            '0.9L' => '0.9L',
                            '1.0L' => '1.0L',
                            '1.1L' => '1.1L',
                            '1.2L' => '1.2L',
                            '1.3L' => '1.3L',
                            '1.4L' => '1.4L',
                            '1.5L' => '1.5L',
                            '1.6L' => '1.6L',
                            '1.7L' => '1.7L',
                            '1.8L' => '1.8L',
                            '1.9L' => '1.9L',
                            '2.0L' => '2.0L',
                            '2.2L' => '2.2L',
                            '2.4L' => '2.4L',
                            '2.6L' => '2.6L',
                            '2.8L' => '2.8L',
                            '3.0L' => '3.0L',
                            '3.5L' => '3.5L',
                            '3.6L' => '3.6L',
                            '4.0L' => '4.0L',
                            '4.5L' => '4.5L',
                            '5.0L' => '5.0L',
                            '5.5L' => '5.5L',
                            '6.0L' => '6.0L',
                            '6.5L' => '6.5L',
                            '7.0L' => '7.0L',
                        ]" />
                        <x-input-error :messages="$errors->get('engine')" />
                    </div>
                    <!-- colors -->
                    <div class="col-left">
                        <x-text tag="label" for="colors" class="required">Color</x-text><br>
                        <x-select name="color" id="color" :value="old('make', $listing->advert->color)" :options="[
                            '' => old('make', $listing->advert->color) ?? 'Select',
                            'red' => 'Red',
                            'green' => 'Green',
                            'blue' => 'Blue',
                            'other' => 'Other',
                        ]" />
                        <x-input-error :messages="$errors->get('color')" />
                    </div>
                </div>

                <div class="vhicle-details-container">
                    <!-- Body Type -->
                    <div class="mt-6">
                        <x-text tag="h2" size="2xl" weight="bold">Body type</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="body-options">
                            @php
                                $bodyTypes = [
                                    'Saloon',
                                    'Hatchback',
                                    'Convertible',
                                    'Coupe',
                                    'SUV',
                                    'MPV',
                                    'Estate',
                                    '4X4',
                                    'Other',
                                ];
                                $currentBodyType = old('bodyType', $listing->advert->bodyType);
                            @endphp

                            @foreach ($bodyTypes as $type)
                                <button type="button" data-value="{{ $type }}"
                                    class="p-2 border rounded hover:bg-gray-100 {{ $currentBodyType == $type ? 'bg-customBlue text-customRed' : '' }}"
                                    onclick="selectBodyType(this, '{{ $type }}')">
                                    {{ $type }}
                                </button>
                            @endforeach

                            <input type="hidden" name="bodyType" id="body_type" value="{{ $currentBodyType }}" required>
                        </div>
                        <x-input-error :messages="$errors->get('bodyType')" />
                    </div>

                    <!-- Transmission -->
                    <div class="mt-8">
                        <x-text tag="h2" size="2xl" weight="bold">Gearbox</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="gearbox-options">
                            @php
                                $transmissionTypes = ['Automatic', 'Manual', 'Tiptronic', 'Other'];
                                $currentTransmission = old('transmission', $listing->advert->transmission);
                            @endphp

                            @foreach ($transmissionTypes as $type)
                                <button type="button" data-value="{{ $type }}"
                                    class="p-2 border rounded hover:bg-gray-100 {{ $currentTransmission == $type ? 'bg-customBlue text-customRed' : '' }}"
                                    onclick="selectOption(this, '{{ $type }}', 'gearbox')">
                                    {{ $type }}
                                </button>
                            @endforeach
                            <input type="hidden" name="transmission" id="gearbox" value="{{ $currentTransmission }}"
                                required>
                        </div>
                        <x-input-error :messages="$errors->get('transmission')" />
                    </div>

                    <!-- Fuel Type -->
                    <div class="mt-8">
                        <x-text tag="h2" size="2xl" weight="bold">Fuel type</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="fuel-options">
                            @php
                                $fuelTypes = ['Petrol', 'Diesel', 'Electronic', 'Hybrid', 'Gas', 'Other'];
                                $currentFuelType = old('fuelType', $listing->advert->fuelType);
                            @endphp

                            @foreach ($fuelTypes as $type)
                                <button type="button" data-value="{{ $type }}"
                                    class="p-2 border rounded hover:bg-gray-100 {{ $currentFuelType == $type ? 'bg-customBlue text-customRed' : '' }}"
                                    onclick="selectOption(this, '{{ $type }}', 'fuel_type')">
                                    {{ $type }}
                                </button>
                            @endforeach
                            <input type="hidden" name="fuelType" id="fuel_type" value="{{ $currentFuelType }}"
                                required>
                        </div>
                        <x-input-error :messages="$errors->get('fuelType')" />
                    </div>
                </div>

                <button type="button" class="next-btn">Next
                    <i class="fa-solid fa-arrow-right"
                        style="color: #ffffff; margin-left: 10px; vertical-align: middle;"></i>
                </button>
            </div>

            <!-- Advert details -->
            <div class="form-step form_2">
                <x-text tag="h2" size="2xl" weight="bold">Upload images</x-text>
                <x-text tag="span" size="base" color="black">Your advert can contain up to 20 photos. The first
                    image will be the main.</x-text>
                <div class="sec-box img-up">
                    @if ($listing->advert->images)
                        <livewire:image-manager :listing="$listing" />
                    @endif

                    <!-- New Image Upload Section -->
                    <x-image-uploader 
                    type="file" name="images[]" id="image-input" multiple accept="image/*"/>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Asking price</x-text>
                <x-text tag="span" size="base" color="black">We encourage you to specify a sensible price to
                    attract more potential buyers. You can always change the price even after the advert is
                    published.</x-text>
                <div class="sec-box">
                    <div class="col-left amount-input">
                        <x-text tag="span" size="base" color="black">Rs.</x-text>
                        <x-text-input id="price" name="price" :value="old('price', $listing->advert->price)" placeholder="" type="number" />
                        <x-text tag="span" size="base" color="black">.00</x-text>
                    </div>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Advert description</x-text>
                <div class="advert-desceript">
                    <x-text tag="label" for="description" class="required">Advert description</x-text><br>
                    <textarea id="description" name="description" placeholder="Describe your car in detail..." rows="15">{{ old('description', $listing->advert->description) }}</textarea>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Contact details</x-text>
                <div class="sec-box">
                    <div class="col-left">
                        <x-text tag="label" for="phone-number" class="required">Phone number</x-text><br>
                        <x-text-input id="phone-number" name="contactNumber" :value="old('contactNumber', $listing->advert->contactNumber)"
                            placeholder="Phone number (077..)" />
                    </div>
                    <div class="col-left">
                        <x-text tag="label" for="email" class="required">Email</x-text><br>
                        <x-text-input id="email" name="advertEmail" :value="old('advertEmail', $listing->advert->advertEmail)" />
                    </div>
                    <div class="col-right">
                        <x-text tag="label" for="location" class="required">Location</x-text><br>
                        <x-text-input id="location" name="location" :value="old('location', $listing->advert->location)" />
                    </div>
                </div>

                <button type="button" class="prev-btn">
                    <i class="fa-solid fa-arrow-left" style="margin-right: 10px;"></i>Back
                </button>
                <button type="button" class="next-btn">Next
                    <i class="fa-solid fa-arrow-right" style="color: #ffffff; margin-left: 10px;"></i>
                </button>
            </div>

            <!-- Review & publish -->
            <div class="form-step form_3">
                <div class="publish-top">
                    <h2 style="font-size:3vw; font-weight: bold;">Advert summary</h2>
                    <span>Please review the details and click the 'Publish advert' button to post. To prevent potential
                        spam or suspicious behavior our team will review.</span>
                    <div class="advert-preview-btn">
                        <a href="#" class="perview-btn"><i class="fa-solid fa-eye"
                                style="margin-right: 5px;"></i>Preview advert</a>
                        <a href="#" class="edit-advert-btn prev-btn"><i class="fa-solid fa-pencil"
                                style="margin-right: 5px;"></i>Edit advert</a>
                    </div>

                    <div class="advert-summery-info">
                        <div>
                            <h1 class="advert-opt-title">Mercedes-Benz CLA Class</h1>
                            <span class="">Used • 2014 Reg • 76,000 km • Automatic • Diesel</span>
                        </div>
                        <i class="fa-solid fa-circle-check advert-summery-icon"></i>
                    </div>
                    <div class="advert-summery-info">
                        <div>
                            <h1 class="advert-opt-title">Advert photos</h1>
                            <span class="">Upload at least 1 photo to attract more buyers.</span>
                        </div>
                        <i class="fa-solid fa-circle-check advert-summery-icon"></i>
                    </div>
                    <div class="advert-summery-info">
                        <div>
                            <h1 class="advert-opt-title">Asking price</h1>
                            <span class=""><strong class="font-bold text-customRed"> Rs. 12,345 </strong> / Your
                                price is very attractive</span>
                        </div>
                        <i class="fa-solid fa-circle-check advert-summery-icon"></i>
                    </div>
                    <div class="advert-summery-last">
                        <div>
                            <h1 class="advert-opt-title">Contact details</h1>
                            <span class="">alexchamara76@gmail.com, 0705782002 </span>
                        </div>
                        <i class="fa-solid fa-circle-check advert-summery-icon"></i>
                    </div>

                    <div class="flex justify-center items-center h-full pb-[24px] mb-[24px]">
                        <span class="text-center text-[12px]">Sign in to your account at anytime to manage, edit or
                            deactivate the advert.</span>
                    </div>

                    <button type="button" class="prev-btn">
                        <i class="fa-solid fa-arrow-left"></i>Back</button>
                    <button type="submit" class="publish-btn" id="open-popup">Update Advert</button>
                </div>
            </div>
        </form>
    </main>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Get redirect section from session
            const redirectSection = "{{ session('redirect_section', 'dashboard') }}";

            // Load the specified page
            loadPage(redirectSection);

            // Clear the session after redirect
            @if (session('redirect_section'))
                history.replaceState(null, '', window.location.pathname);
            @endif
        });

        window.addEventListener('DOMContentLoaded', () => {
            // Auto hide messages after 3.5 seconds
            setTimeout(() => {
                const messages = document.querySelectorAll('[role="alert"]');
                messages.forEach(msg => msg.style.display = 'none');
            }, 3500);
        });

        // Handle button selection for body type, gearbox, and fuel type
        function selectOption(button, value, inputId) {
            // Remove selection from all buttons in the same group
            button.closest('.options').querySelectorAll('button').forEach(btn => {
                btn.classList.remove('bg-customBlue', 'text-customRed');
            });

            // Add selection to clicked button
            button.classList.add('bg-customBlue', 'text-customRed');

            // Update hidden input
            document.getElementById(inputId).value = value;
        }

        // Set initial selections
        document.addEventListener('DOMContentLoaded', () => {
            ['gearbox', 'fuel_type'].forEach(inputId => {
                const currentValue = document.getElementById(inputId).value;
                if (currentValue) {
                    const button = document.querySelector(`button[data-value="${currentValue}"]`);
                    if (button) {
                        button.classList.add('bg-customBlue', 'text-customRed');
                    }
                }
            });
        });
        // Payment form
        document.addEventListener('DOMContentLoaded', function() {
            const paymentOptions = document.querySelectorAll('.payment-options input[type="radio"]');
            const paymentForms = document.querySelectorAll('.payment-form');
            const openPopupBtn = document.getElementById('open-popup');
            const closePopupBtn = document.getElementById('close-popup');
            const paymentPopup = document.getElementById('payment-popup');
            const blurBackground = document.getElementById('blur-background');

            function showForm(id) {
                paymentForms.forEach(form => form.classList.remove('active'));
                document.getElementById(id).classList.add('active');
            }

            paymentOptions.forEach(option => {
                option.addEventListener('change', function() {
                    showForm(option.id + '-form');
                });
            });

            // Open the popup
            openPopupBtn.addEventListener('click', function() {
                paymentPopup.classList.add('active');
                blurBackground.classList.add('active');
            });

            // Close the popup
            closePopupBtn.addEventListener('click', function() {
                paymentPopup.classList.remove('active');
                blurBackground.classList.remove('active');
            });

            // Trigger default form display
            showForm('credit-card-form');
        });


        const formSteps = document.querySelectorAll('.form-step');
        const nextBtns = document.querySelectorAll('.next-btn');
        const prevBtns = document.querySelectorAll('.prev-btn', '.perview-btn');
        const editAdvert = document.querySelector('.perview-btn');
        const progressSteps = document.querySelectorAll('.progress-bar .step');
        const progressLine = document.querySelector('.progress-line .progress');

        let formStepIndex = 0;

        nextBtns.forEach(button => {
            button.addEventListener('click', () => {
                formStepIndex++;
                updateFormSteps();
                updateProgressBar();
            });
        });

        prevBtns.forEach(button => {
            button.addEventListener('click', () => {
                formStepIndex--;
                updateFormSteps();
                updateProgressBar();
            });
        });

        // editAdvert.forEach(button => {
        //     button.addEventListener('click', () => {
        //         if (formStepIndex > 0) {
        //             formStepIndex--;
        //             updateFormSteps();
        //             updateProgressBar();
        //         }
        //     });
        // });

        function updateFormSteps() {
            formSteps.forEach((step, index) => {
                step.classList.toggle('active', index === formStepIndex);
            });
        }

        function updateProgressBar() {
            progressSteps.forEach((step, index) => {
                step.classList.toggle('active', index <= formStepIndex);
            });
            const progressPercentage = (formStepIndex) / (progressSteps.length - 1) * 100;
            progressLine.style.width = `${progressPercentage}%`;
        }

       
        // handle button selection for body type, gearbox, and fuel type
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.options').forEach(optionGroup => {
                optionGroup.querySelectorAll('button').forEach(button => {
                    button.addEventListener('click', function() {
                        console.log('Button clicked:', this); // Debugging log

                        // Remove selected state from all buttons in the group
                        optionGroup.querySelectorAll('button').forEach(btn => {
                            btn.classList.remove('bg-customBlue',
                                'text-customBlue');
                            btn.classList.add('bg-customBlue', 'text-gray-900');
                        });

                        // Add selected state to the clicked button
                        this.classList.add('bg-customBlue', 'text-customRed');
                        this.classList.remove('bg-customBlue', 'text-gray-900');

                        // Update the hidden input with the selected value
                        let hiddenInput = optionGroup.querySelector('input[type="hidden"]');
                        if (hiddenInput) {
                            hiddenInput.value = this.getAttribute('data-value');
                            console.log('Hidden input updated:', hiddenInput
                                .value); // Debugging log
                        } else {
                            console.error('Hidden input not found'); // Error log
                        }
                    });
                });
            });
        });
    </script>
@endsection
