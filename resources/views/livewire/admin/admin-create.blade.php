<div class="ud-new-admin-page">
    <div class="ud-pro-change">
        <x-text tag="h2" size="2xl" weight="bold" color="customBlue" darkColor="gray-100" class="text-[50px] mb-3">
            Add new admin
        </x-text>

        <x-text tag="span" size="base" color="gray-600" darkColor="gray-400" class="block mt-2">
            Fill out the form below to add a new admin. Ensure that all information is accurate and complete.
        </x-text>
        
        <form wire:submit.prevent="submit" class="mt-4">
            @csrf
            <div class="mb-4">
                <x-input-label for="admName" :value="__('Full Name')" class="star" />
                <x-text-input type="text" wire:model.defer="admName" id="admName" placeholder="Enter admin name" class="mt-1"
                    required />
                <x-input-error :messages="$errors->get('admName')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="admEmail" :value="__('Email address')" class="star" />
                <x-text-input type="email" wire:model.defer="admEmail" id="admEmail" placeholder="Enter admin email" class="mt-1"
                    required />
                <x-input-error :messages="$errors->get('admEmail')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="admPwd" :value="__('Password')" class="star" />
                <x-text-input type="password" wire:model.defer="admPwd" id="admPwd" placeholder="Enter password" class="mt-1"
                    required />
                <x-input-error :messages="$errors->get('admPwd')" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-input-label for="admPwd_confirmation" :value="__('Confirm Password')" class="star" />
                <x-text-input type="password" wire:model.defer="admPwd_confirmation" id="admPwd_confirmation" class="mt-1"
                    placeholder="Enter repeat password" required />
                <x-input-error :messages="$errors->get('admPwd_confirmation')" class="mt-2" />
            </div>

            <x-primary-button>
                Register new admin
            </x-primary-button>

            <x-form-submit-mg />
        </form>
    </div>
</div>
