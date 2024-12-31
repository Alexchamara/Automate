<div>
    <form wire:submit.prevent="updatePassword" class="mt-6 space-y-6">
        <div>
            <x-input-label for="current_password" :value="__('Current Password')" class="star" />
            <x-text-input wire:model.defer="current_password" id="current_password" type="password"
                class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" class="star" />
            <x-text-input wire:model.defer="password" id="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="star" />
            <x-text-input wire:model.defer="password_confirmation" id="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button>
            Change password
        </x-primary-button>

        <x-form-submit-mg />
    </form>
</div>
