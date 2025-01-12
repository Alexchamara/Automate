@extends('layouts.app')
@section('pages')
    <main class="advert-main-container ">
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

        <!-- Add vehicle informations -->
        <form action="{{ route('advert.store') }}" method="POST" id="multi-step-form" class="dark:bg-gray-800"
            enctype="multipart/form-data">
            @csrf

            <div class="form-step active form_1 pt-5">
                <x-text tag="h2" size="2xl" weight="bold">Make & model</x-text>
                <div class="sec-box">
                    <!-- Make -->
                    <div class="col-left">
                        <x-text tag="label" for="make" class="required">Make</x-text><br>
                        <x-select name="make" id="make" class="dark:border-white" :options="[
                            'DEF' => 'Select',
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
                        ]" required />
                        <x-input-error :messages="$errors->get('make')" />
                    </div>
                    <!-- Model -->
                    <div class="col-right">
                        <x-text tag="label" for="model" class="required">Model</x-text><br>
                        <x-select id="model" name="model" :options="[
                            'DEF' => 'Model',
                            'COMMANDER' => 'Commander',
                            'COMPASS' => 'Compass',
                            'GRAND CHEROKEE' => 'Grand Cherokee',
                            'LIBERTY' => 'Liberty',
                            'PATRIOT' => 'Patriot',
                            'WRANGLER' => 'Wrangler',
                        ]" required />
                        <x-input-error :messages="$errors->get('model')" />
                    </div>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Age, mileage & other</x-text>
                <div class="sec-box">
                    <!-- Registration year -->
                    <div class="col-left">
                        <x-text tag="label" for="year" class="required">Year of registration</x-text><br>
                        <x-select name="registrationYear" id="years" :options="[
                            '' => 'Select',
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
                        ]" required />
                        <x-input-error :messages="$errors->get('registrationYear')" />
                    </div>
                    <!-- Mileage -->
                    <div class="col-right">
                        <x-text tag="label" for="mileage" class="required">Current mileage</x-text><br>
                        <x-text-input type="text" name="mileage" id="mileage" placeholder="e.g. 50000" class="mt-1"
                            required />
                        <x-input-error :messages="$errors->get('mileage')" />
                    </div>
                    <!-- Condition -->
                    <div class="col-left">
                        <x-text tag="label" for="condition" class="required">Condition</x-text><br>
                        <x-select name="condition" id="condition" :options="[
                            '' => 'Select',
                            'brand new' => 'Brand new',
                            'reconditioned' => 'Reconditioned',
                            'used' => 'Used',
                            'other' => 'Other',
                        ]" required />
                        <x-input-error :messages="$errors->get('condition')" />
                    </div>
                    <!-- Engine -->
                    <div class="col-right">
                        <x-text tag="label" for="engine" class="required">Engine</x-text><br>
                        <x-select id="engine" name="engine" :options="[
                            '' => 'Select',
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
                        ]" required />
                        <x-input-error :messages="$errors->get('engine')" />
                    </div>
                    <!-- colors -->
                    <div class="col-left">
                        <x-text tag="label" for="colors" class="required">Color</x-text><br>
                        <x-select name="color" id="color" :options="[
                            '' => 'Select',
                            'red' => 'Red',
                            'green' => 'Green',
                            'blue' => 'Blue',
                            'other' => 'Other',
                        ]" required />
                        <x-input-error :messages="$errors->get('color')" />
                    </div>
                </div>

                <div class="vhicle-details-container">
                    <!-- Body Type -->
                    <div class="mt-6">
                        <x-text tag="h2" size="2xl" weight="bold">Body type</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="body-options">
                            <button type="button" data-value="Saloon"
                                class="p-2 border rounded hover:bg-gray-100">Saloon</button>
                            <button type="button" data-value="Hatchback"
                                class="p-2 border rounded hover:bg-gray-100">Hatchback</button>
                            <button type="button" data-value="Convertible"
                                class="p-2 border rounded hover:bg-gray-100">Convertible</button>
                            <button type="button" data-value="Coupe"
                                class="p-2 border rounded hover:bg-gray-100">Coupe</button>
                            <button type="button" data-value="SUV"
                                class="p-2 border rounded hover:bg-gray-100">SUV</button>
                            <button type="button" data-value="MPV"
                                class="p-2 border rounded hover:bg-gray-100">MPV</button>
                            <button type="button" data-value="Estate"
                                class="p-2 border rounded hover:bg-gray-100">Estate</button>
                            <button type="button" data-value="4X4"
                                class="p-2 border rounded hover:bg-gray-100">4X4</button>
                            <button type="button" data-value="Other"
                                class="p-2 border rounded hover:bg-gray-100">Other</button>
                            <input type="hidden" name="bodyType" id="body_type" value="" required>
                        </div>
                        <x-input-error :messages="$errors->get('bodyType')" />
                    </div>

                    <!-- Gearbox -->
                    <div class="mt-8">
                        <x-text tag="h2" size="2xl" weight="bold">Gearbox</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="gearbox-options">
                            <button type="button" data-value="Automatic"
                                class="p-2 border rounded hover:bg-gray-100">Automatic</button>
                            <button type="button" data-value="Manual"
                                class="p-2 border rounded hover:bg-gray-100">Manual</button>
                            <button type="button" data-value="Tiptronic"
                                class="p-2 border rounded hover:bg-gray-100">Tiptronic</button>
                            <button type="button" data-value="Other"
                                class="p-2 border rounded hover:bg-gray-100">Other</button>
                            <input type="hidden" name="transmission" id="gearbox" value="" required>
                        </div>
                        <x-input-error :messages="$errors->get('transmission')" />
                    </div>

                    <!-- Fuel Type -->
                    <div class="mt-8">
                        <x-text tag="h2" size="2xl" weight="bold">Fuel type</x-text>
                        <div class="mt-4 grid grid-cols-4 gap-4 options" id="fuel-options">
                            <button type="button" data-value="Petrol"
                                class="p-2 border rounded hover:bg-gray-100">Petrol</button>
                            <button type="button" data-value="Diesel"
                                class="p-2 border rounded hover:bg-gray-100">Diesel</button>
                            <button type="button" data-value="Electronic"
                                class="p-2 border rounded hover:bg-gray-100">Electronic</button>
                            <button type="button" data-value="Hybrid"
                                class="p-2 border rounded hover:bg-gray-100">Hybrid</button>
                            <button type="button" data-value="Gas"
                                class="p-2 border rounded hover:bg-gray-100">Gas</button>
                            <button type="button" data-value="Other"
                                class="p-2 border rounded hover:bg-gray-100">Other</button>
                            <input type="hidden" name="fuelType" id="fuel_type" value="" required>
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
                    <x-image-uploader type="file" name="images[]" id="image-input" multiple accept="image/*" />
                    {{-- <x-text-input type="file" name="images[]" id="image-input" multiple accept="image/*" /> --}}

                </div>

                <x-text tag="h2" size="2xl" weight="bold">Asking price</x-text>
                <x-text tag="span" size="base" color="black">We encourage you to specify a sensible price to
                    attract more potential buyers. You can always change the price even after the advert is
                    published.</x-text>
                <div class="sec-box">
                    <div class="col-left amount-input">
                        <x-text tag="span" size="base" color="black">Rs.</x-text>
                        <x-text-input id="price" name="price" placeholder="price..." type="number" />
                        <x-text tag="span" size="base" color="black">.00</x-text>
                    </div>
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Advert description</x-text>
                <div class="advert-desceript">
                    <x-text tag="label" for="description" class="required">Advert description</x-text><br>
                    <x-textarea id="description" name="description" placeholder="Describe your car in detail..."
                        rows="15" />
                </div>

                <x-text tag="h2" size="2xl" weight="bold">Contact details</x-text>
                <div class="sec-box">
                    <div class="col-left">
                        <x-text tag="label" for="phone-number" class="required">Phone number</x-text><br>
                        <x-text-input id="phone-number" name="contactNumber" placeholder="Phone number (077..)" />
                    </div>
                    <div class="col-left">
                        <x-text tag="label" for="email" class="required">Email</x-text><br>
                        <x-text-input id="email" name="advertEmail" />
                    </div>
                    <div class="col-right">
                        <x-text tag="label" for="location" class="required">Location</x-text><br>
                        <x-text-input id="location" name="location" />
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
                    <button type="submit" class="publish-btn" id="open-popup">Publish advert</button>
                </div>
            </div>
        </form>
    </main>

    <!-- progress bar -->
    <script type="text/javascript">
        // document.addEventListener('DOMContentLoaded', function() {
        //     const nextBtn = document.querySelector('.next-btn');
        //     const formStep = document.querySelector('.form_1');
        //     const form = document.getElementById('multi-step-form');
        //     const progressBar = document.querySelector('.progress');

        //     // Initialize form navigation
        //     let currentStepIndex = 1;

        //     nextBtn.addEventListener('click', function(event) {
        //         event.preventDefault();
        //         event.stopPropagation();

        //         // Reset previous error states
        //         clearErrors();

        //         // Validate all required fields
        //         const isValid = validateFormStep();

        //         if (!isValid) {
        //             return false;
        //         }

        //         // If validation passes, proceed to next step
        //         goToNextStep();
        //     });

        //     function validateFormStep() {
        //         let isValid = true;
        //         let firstInvalidElement = null;

        //         // Check select elements
        //         const selects = formStep.querySelectorAll('select[required]');
        //         selects.forEach(select => {
        //             if (select.value === '' || select.value === 'DEF' || select.value === 'Select') {
        //                 isValid = false;
        //                 showError(select);
        //                 if (!firstInvalidElement) firstInvalidElement = select;
        //             }
        //         });

        //         // Check hidden inputs
        //         const hiddenInputs = ['body_type', 'gearbox', 'fuel_type'];
        //         hiddenInputs.forEach(inputId => {
        //             const input = document.getElementById(inputId);
        //             if (input && !input.value) {
        //                 isValid = false;
        //                 showError(input);
        //                 if (!firstInvalidElement) firstInvalidElement = input;
        //             }
        //         });

        //         // Focus first invalid element
        //         if (firstInvalidElement) {
        //             firstInvalidElement.scrollIntoView({
        //                 behavior: 'smooth',
        //                 block: 'center'
        //             });
        //             firstInvalidElement.focus();
        //         }

        //         return isValid;
        //     }

        //     function showError(element) {
        //         const errorElement = element.nextElementSibling;
        //         if (errorElement && errorElement.classList.contains('text-red-600')) {
        //             errorElement.textContent = 'This field is required.';
        //         } else {
        //             const errorMessage = document.createElement('div');
        //             errorMessage.classList.add('text-sm', 'text-red-600', 'dark:text-red-500', 'space-y-1');
        //             errorMessage.textContent = 'This field is required.';
        //             element.parentNode.insertBefore(errorMessage, element.nextSibling);
        //         }
        //     }

        //     function clearErrors() {
        //         const errorMessages = formStep.querySelectorAll('.text-red-600');
        //         errorMessages.forEach(error => error.textContent = '');
        //     }

        //     function goToNextStep() {
        //         const currentStep = document.querySelector('.form-step.active');
        //         const nextStep = currentStep.nextElementSibling;

        //         if (nextStep) {
        //             currentStep.classList.remove('active');
        //             nextStep.classList.add('active');
        //             currentStepIndex++;
        //             progressBar.style.width = `${(currentStepIndex - 1) * 50}%`;
        //         }
        //     }
        // });

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
