<div>
    {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
    <form wire:submit.prevent="updateProfile" class="mt-4">
        <div class="mb-4">
            <x-text tag="label" for="fullName" size="sm" weight="medium" color="gray-700" darkColor="gray-300"
                class="block">
                {{ __('Full Name') }}
            </x-text>
            <x-text-input type="text" wire:model="name" id="fullName" placeholder="Enter your full name"
                class="mt-1" autofocus />
            @error('name')
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            @enderror
        </div>

        <div class="mb-4">
            <x-text tag="label" for="email" size="sm" weight="medium" color="gray-700" darkColor="gray-300"
                class="block">
                {{ __('Email address') }}
            </x-text>
            <x-text-input type="email" wire:model="email" id="email" placeholder="Enter your email"
                class="mt-1" />
            @error('email')
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @enderror
        </div>

        <div class="mb-4">
            <x-text tag="label" for="mobile" size="sm" weight="medium" color="gray-700" darkColor="gray-300"
                class="block">
                Mobile
            </x-text>
            <x-text-input type="text" wire:model="mobile" id="mobile" placeholder="Enter your phone number"
                class="mt-1" value="{{ old('phone', Auth::user()->phone) }}" min="0"/>
            @error('mobile')
                <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                Save my details
            </x-primary-button>

            <x-form-submit-mg />
        </div>
    </form>

</div>
