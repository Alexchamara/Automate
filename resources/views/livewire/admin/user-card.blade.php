<div>
    <section class="user-info-container dark:shadow-none dark:bg-gray-800">
        <div class="user-info-content">
            <div class="flex justify-between items-center">
                <div class="ud-profile-image-wrapper">
                    {{-- <img src="{{ asset('https://png.pngtree.com/png-clipart/20230927/original/pngtree-man-avatar-image-for-profile-png-image_13001877.png') }}"
                        alt="profile image" class="user-card-profile-image dark:border dark:border-white"> --}}
                    <span class="user-info-title">User ID: {{ $user->id }}</span>
                </div>
                <div class="user-card-bottom">
                    @if ($user->role === 'admin')
                        <x-text tag="label" for="admin" size="base" weight="medium" color="white" darkColor="white" class="status-label py-1 px-3 rounded-md bg-customBlue">
                            Admin
                        </x-text>
                    @else
                        @if ($user->isActive)
                            <x-text tag="label" for="active" size="base" weight="medium" color="white" darkColor="white" class="status-label py-1 px-3 rounded-md" style="background-color: green;">
                                Active User
                            </x-text>
                        @else
                            <x-text tag="label" for="deactive" size="base" weight="medium" color="white" darkColor="white" class="status-label py-1 px-3 rounded-md" style="background-color: #A82E23;">
                                Deactivated User
                            </x-text>
                        @endif
                    @endif
                </div>
            </div>

            <div class="user-listing-info flex">
                <div class="user-info-column">
                    <div class="user-info-tag">
                        <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                            <i class="fa-regular fa-id-card mr-3 text-customBlue dark:text-white"></i>Name: {{ $user->name }}
                        </x-text>
                    </div>
                    <div class="user-info-tag">
                        <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                            <i class="fa-regular fa-calendar-days mr-3 text-customBlue dark:text-white"></i>Registered Date: {{ $user->created_at->format('d M Y') }}
                        </x-text>
                    </div>
                </div>
                <div class="user-info-column">
                    <div class="user-info-tag">
                        <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                            <i class="fa-solid fa-mobile-screen mr-3 text-customBlue dark:text-white"></i>Tel Number: {{ $user->mobile }}
                        </x-text>
                    </div>
                    <div class="user-info-tag">
                        <x-text tag="span" size="base" weight="medium" color="gray-700" darkColor="gray-300">
                            <i class="fa-solid fa-envelope-open-text mr-3 text-customBlue dark:text-white"></i>Email: {{ $user->email }}
                        </x-text>
                    </div>
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-customGray">
                <x-form-submit-mg />
            </div>
            <div class="">
                @if ($user->role === 'user')
                    @if ($user->isActive)
                        <form wire:submit.prevent="deactivateAccount">
                            @csrf
                            <button type="submit" class="remove-button savedAd-delete dark:bg-customRed dark:text-white dark:p-1 dark:m-2">
                                <i class="fa-solid fa-user-lock mr-1"></i>Deactivate Account
                            </button>
                        </form>
                    @else
                        <form wire:submit.prevent="activateAccount">
                            @csrf
                            <button type="submit" class="remove-button savedAd-delete">
                                <i class="fa-solid fa-unlock-keyhole mr-1"></i>Activate Account
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </section>
</div>