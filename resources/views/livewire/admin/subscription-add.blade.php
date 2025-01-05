<div>
    @if ($existingPlanId)
        <form wire:submit.prevent="attachNewPrice" class="mt-4 dark:bg-gray-800">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                        for="price_name">
                        Price Name <span class="text-red-500">*</span>
                    </x-text>
                    <x-text-input wire:model.defer="price_name" id="price_name" required />
                    <x-input-error :messages="$errors->get('price_name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                        for="price">
                        Price <span class="text-red-500">*</span>
                    </x-text>
                    <x-text-input wire:model.defer="price" type="number" step="0.01" min="0" id="price" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                        for="currency">
                        Currency <span class="text-red-500">*</span>
                    </x-text>
                    <x-select wire:model.defer="currency" id="currency" :options="[
                        'lkr' => 'LKR',
                        'usd' => 'USD',
                        'eur' => 'EUR',
                    ]" :value="$currency" required />
                </div>
            </div>

            <div class="mb-4">
                <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                    class="flex items-center">
                    <input type="checkbox" wire:model="is_recurring" class="mr-2">
                    <span>Recurring Payment</span>
                </x-text>
            </div>

            @if ($is_recurring)
                <div class="mb-4">
                    <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                        for="billing_period">
                        Billing Period <span class="text-red-500">*</span>
                    </x-text>
                    <x-select wire:model.defer="billing_period" id="billing_period" :options="[
                        'day' => 'Daily',
                        'week' => 'Weekly',
                        'month' => 'Monthly',
                        'year' => 'Yearly',
                    ]" :value="$billing_period"
                        required />
                </div>
            @endif

            <div class="mb-4">
                <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                    for="price_description">
                    Price Description
                </x-text>
                <x-textarea wire:model.defer="price_description" id="price_description" rows="2" class="w-full" />
                <x-input-error :messages="$errors->get('price_description')" class="mt-2" />
            </div>

            <div>
                <x-primary-button>Add New Price</x-primary-button>
                <x-form-submit-mg />
            </div>
        </form>
    @endif
</div>
