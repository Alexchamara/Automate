<div class="user-info-container dark:shadow-none dark:bg-gray-800 px-8 py-8">
    <div class="ud-pro-change">
        <x-text tag="h2" size="2xl" weight="bold" color="customBlue" darkColor="gray-100" class="text-[50px] mb-3">
            Add New Plan
        </x-text>

        <x-text tag="span" size="base" color="gray-600" darkColor="gray-400" class="block mt-2 text-start">
            Create a new subscription plan with features
        </x-text>

        <form wire:submit.prevent="submit" class="mt-4">
            @csrf
            <div class="mb-4">
                <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                    for="name">
                    Plan Name <span class="text-red-500">*</span>
                </x-text>
                <x-text-input wire:model.defer="name" type="text" id="name" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                    for="description">
                    Description <span class="text-red-500">*</span>
                </x-text>
                <x-textarea wire:model.defer="description" id="description" class="w-full" rows="3" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300"
                        for="price">
                        Price <span class="text-red-500">*</span>
                    </x-text>
                    <x-text-input wire:model.defer="price" type="number" min="0" step="0.01" id="price" required />
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
                <x-textarea wire:model.defer="price_description" id="price_description" class="w-full" rows="2" />
                <x-input-error :messages="$errors->get('price_description')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-text tag="label" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                    Plan Features <span class="text-red-500">*</span>
                </x-text>
                @foreach ($planItems as $index => $item)
                    <div class="flex gap-2 mt-2">
                        <x-textarea wire:model.defer="planItems.{{ $index }}.feature" name="feature"
                            id="feature_{{ $index }}" class="w-full" rows="3" required />
                        <button type="button" wire:click="removePlanItem({{ $index }})"
                            class="text-red-500">Remove</button>
                    </div>
                @endforeach
                <button type="button" wire:click="addPlanItem" class="mt-2 text-customBlue dark:text-blue-500">Add Feature</button>
            </div>

            <x-primary-button>Create Plan</x-primary-button>
            <x-form-submit-mg />
        </form>
    </div>
</div>
