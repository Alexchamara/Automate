<div class="my-3">
    @foreach ($plans as $plan)
        <section class="user-info-container dark:shadow-none dark:bg-gray-800">
            <div class="px-3">
                <div class="flex justify-between items-center">
                    <div class="ud-profile-image-wrapper">
                        <span class="user-info-title">Subscription Plan</span>
                    </div>
                    <button wire:click="openAddPrice({{ $plan->id }})"
                        class="remove-button savedAd-delete dark:bg-customRed dark:text-white dark:p-2 dark:rounded-md">
                        <i class="fa-solid fa-pencil mr-1"></i>Add New Price
                    </button>
                    {{-- <div class="user-card-bottom">
                        <x-text tag="label" for="admin" size="base" weight="medium" color="white"
                            darkColor="white" class="status-label py-1 px-3 rounded-md bg-customBlue">
                            Admin
                        </x-text>
                        <x-text tag="label" for="active" size="base" weight="medium" color="white"
                            darkColor="white" class="status-label py-1 px-3 rounded-md"
                            style="background-color: green;">
                            Active User
                        </x-text>
                        <x-text tag="label" for="deactive" size="base" weight="medium" color="white"
                            darkColor="white" class="status-label py-1 px-3 rounded-md"
                            style="background-color: #A82E23;">
                            Deactivated User
                        </x-text>
                    </div> --}}
                </div>

                <div class="user-listing-info flex">
                    <div class="user-info-column">
                        <div class="user-info-tag">
                            <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                                <i class="fa-solid fa-circle-info mr-3 text-customBlue dark:text-white"></i>
                                Plan ID: {{ $plan->id }}
                            </x-text>
                        </div>
                        <div class="user-info-tag">
                            <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                                <i class="fa-solid fa-file-signature mr-3 text-customBlue dark:text-white"></i>
                                Plan Name: {{ $plan->name }}
                            </x-text>
                        </div>

                    </div>
                    <div class="user-info-column">
                        <div class="user-info-tag">
                            <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                                <i class="fa-brands fa-stripe mr-3 text-xl text-customBlue dark:text-white"></i>
                                Product ID: {{ $plan->stripe_product_id }}
                            </x-text>
                        </div>
                        <div class="user-info-tag">
                            <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                                <i class="fa-regular fa-calendar-days mr-3 text-customBlue dark:text-white"></i>
                                Created At: {{ $plan->created_at->format('d M Y') }}
                            </x-text>
                        </div>
                    </div>
                </div>
            </div>

            @if ($plan->planItems->count() > 0)
                @foreach ($plan->planItems as $planItem)
                    <div class="my-3" x-data="{ open: false }">
                        <div class="bg-customBlue dark:bg-gray-700">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full text-left px-5 py-1">
                                <x-text tag="label" class="text-white font-semibold text-xl" size="xl"
                                    weight="semibold" color="customBlue">
                                    0{{ $planItem->id }} - {{ $planItem->price_name }}
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
                            x-transition:leave-end="opacity-0 transform scale-95">
                            <div class="user-listing-info flex mt-3">
                                <div class="user-info-column px-5">
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i class="fa-solid fa-circle-info mr-3 text-customBlue dark:text-white"></i>
                                            Price ID: {{ $planItem->id }}
                                        </x-text>
                                    </div>
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-solid fa-file-signature mr-3 text-customBlue dark:text-white"></i>
                                            Price Name: {{ $planItem->price_name }}
                                        </x-text>
                                    </div>
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-solid fa-mobile-screen-button mr-3 text-customBlue dark:text-white"></i>
                                            Currency: {{ strtoupper($plan->currency) }}
                                        </x-text>
                                    </div>
                                    @if ($plan->is_recurring)
                                        <div class="user-info-tag">
                                            <x-text tag="span" size="base">
                                                <i
                                                    class="fa-solid fa-calendar-check mr-3 text-customBlue dark:text-white"></i>
                                                Recurring: {{ $planItem->is_recurring ? 'Yes' : 'One-off' }}
                                            </x-text>
                                        </div>
                                        @if ($planItem->billing_period)
                                            <div class="user-info-tag">
                                                <x-text tag="span" size="base">
                                                    <i
                                                        class="fa-solid fa-calendar-check mr-3 text-customBlue dark:text-white"></i>
                                                    Recurring Period:
                                                    {{ ucfirst($planItem->billing_period) }}ly
                                                </x-text>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="user-info-column px-5">
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-brands fa-stripe mr-3 text-xl text-customBlue dark:text-white"></i>
                                            Stripe Price ID: {{ $planItem->stripe_price_id }}
                                        </x-text>
                                    </div>
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-solid fa-circle-dollar-to-slot mr-3 text-customBlue dark:text-white"></i>
                                            Amount: {{ number_format($planItem->price, 2) }}
                                        </x-text>
                                    </div>
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-regular fa-calendar-days mr-3 text-customBlue dark:text-white"></i>
                                            Created At: {{ $planItem->created_at->format('d M Y') }}
                                        </x-text>
                                    </div>
                                    <div class="user-info-tag">
                                        <x-text tag="span" size="base">
                                            <i
                                                class="fa-regular fa-calendar-days mr-3 text-customBlue dark:text-white"></i>
                                            Updated At: {{ $planItem->updated_at->format('d M Y') }}
                                        </x-text>
                                    </div>
                                </div>
                            </div>

                            <div class="savedAd-buttons">
                                <x-text tag="label" for="admin" size="base" weight="medium" color="white"
                                    darkColor="white" class="m-3 py-1 px-6 rounded-md bg-customBlue">
                                    Admin
                                </x-text>
                                <div class="flex">
                                    <div class="border-customGray">
                                        <x-form-submit-mg />
                                    </div>
                                    <button wire:click="editPrice({{ $planItem->id }})"
                                        class="remove-button savedAd-delete border-l border-customGray dark:bg-customRed dark:text-white dark:p-1 dark:m-2">
                                        <i class="fa-solid fa-pencil mr-1"></i>Update Price
                                    </button>

                                    @if ($planItem->is_active)
                                        <button wire:click="deactivatePrice({{ $planItem->id }})"
                                            class="remove-button savedAd-delete border-l border-customGray dark:bg-customRed dark:text-white dark:p-1 dark:m-2">
                                            <i class="fa-solid fa-user-lock mr-1"></i>Deactivate Price
                                        </button>
                                    @else
                                        <button wire:click="activatePrice({{ $planItem->id }})"
                                            class="remove-button border-l border-customGray savedAd-delete dark:bg-customRed dark:text-white dark:p-1 dark:m-2">
                                            <i class="fa-solid fa-unlock-keyhole mr-1"></i>Activate Price
                                        </button>
                                    @endif

                                    <button wire:click="deletePrice({{ $planItem->id }})"
                                        class="remove-button savedAd-delete border-l border-customGray dark:bg-customRed dark:text-white dark:p-1 dark:m-2">
                                        <i class="fa-regular fa-trash-can mr-1"></i>Delete Price
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    @endforeach


    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($plans as $plan)
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-xl font-bold">{{ $plan->name }}</h3>
                        <p class="text-gray-600">{{ $plan->description }}</p>
                    </div>
                    <button wire:click="openAddPrice({{ $plan->id }})"
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Add Price
                    </button>
                </div>

                @if ($plan->planItems->count() > 0)
                    <div class="border-t pt-4">
                        <div class="mb-4">
                            <h4 class="font-semibold">Base Price:</h4>
                            <div class="flex justify-between items-center">
                                <span>{{ $plan->planItems[0]->feature }}</span>
                                <span>{{ $plan->planItems[0]->stripe_price_id }}</span>
                            </div>
                        </div>

                        <h4 class="font-semibold mb-2">Additional Prices:</h4>
                        <div class="space-y-2">
                            @foreach ($plan->planItems->skip(1) as $item)
                                <div class="flex justify-between items-center">
                                    <span>{{ $item->feature }}</span>
                                    <span>{{ $item->stripe_price_id }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div> --}}

    @if ($showModal)
        <div class="fixed inset-0 bg-gray-600/50 backdrop-blur-sm overflow-y-auto h-full w-full z-50" id="modal">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="flex justify-between items-center mb-4">
                    <x-text tag="h3" size="lg" weight="semibold" color="gray-900" darkColor="gray-100">
                        Add New Price
                    </x-text>
                    <button wire:click="$set('showModal', false)" class="text-gray-500 hover:text-gray-700">
                        <x-text tag="span" size="base" color="gray-500" darkColor="gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </x-text>
                    </button>
                </div>
                @livewire('admin.subscription-add', ['planId' => $selectedPlanId])
            </div>
        </div>
    @endif
</div>
