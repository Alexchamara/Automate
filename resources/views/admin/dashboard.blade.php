<!-- Vendor Dashboard -->
@extends('layouts.app')
@section('pages')
    <div class="pt-[107px]">
        <div class="breadcrumb-bar dark:bg-gray-800 dark:border-b dark:border-gray-700">
            <div class="breadcrumb-title float-right">
                Automate.lk Admin Center
            </div>
        </div>
        <main class="user-dashboard-main-container" style="margin-top: 2%;">
            <!-- upper section -->
            <div class="dashboard-path-wrapper">
                <!-- Breadcrumb -->
                <div class="text-sm text-customGray mb-4 py-2">
                    <a href="#" class="text-customBlue  hover:underline dark:text-gray-300"
                        onclick="loadPage('dashboard')">Dashboard</a>
                    <span id="breadcrumb"> / Dashboard</span>
                </div>
                <!-- Sign out btn -->
                <div class="text-sm mb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="hover:underline"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Sign out') }} <i class="fa-solid fa-arrow-right-from-bracket ml-1"></i>
                        </x-dropdown-link>
                    </form>
                </div>
            </div>

            <!-- Dashboard -->
            <div class="user-dashboard-wrapper">
                <!-- Navbar for mobile -->
                <!-- <div class="bg-customBlue text-white p-4 flex justify-between items-center lg:hidden ">
                                                                                                                                                                                                                <div class="text-lg font-bold">Dashboard</div>
                                                                                                                                                                                                                <button id="menuToggle" class="text-white focus:outline-none">
                                                                                                                                                                                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                                                                                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                                                                                                                                                                                                    </svg>
                                                                                                                                                                                                                </button>
                                                                                                                                                                                                            </div> -->




                <!-- Sidebar for desktop -->
                <div id="sidebar" class="dashboard-sidebar-desktop-wrapper">
                    <ul class="dashboard-sidebar-options flex flex-col text-secondaryText">
                        <li class="u-sidebar-value rounded-t-md hover:rounded-t-md" data-page="dashboard"
                            onclick="loadPage('dashboard')">
                            <i class="fa-regular fa-address-card ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>

                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Dashboard</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Summary of your account</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="listings" onclick="loadPage('listings')">
                            <i class="fa-solid fa-rectangle-ad ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Advertisments</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Manage all advertisments</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="users" onclick="loadPage('users')">
                            <i class="fa-solid fa-users-viewfinder ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Users</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Manage all users</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="admin" onclick="loadPage('admin')">
                            <i class="fa-solid fa-user-tie ud-icon-left dark:text-white"></i>
                            <i class=" fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Admin</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Manage all admins</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="category" onclick="loadPage('category')">
                            <i class="fa-solid fa-list ud-icon-left dark:text-white"></i>
                            <i class=" fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Categories</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Manage all categories</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="exhibitions" onclick="loadPage('exhibitions')">
                            <i class="fa-solid fa-shop ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Exhibitions</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Manage all exhibitions</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="personalDetails" onclick="loadPage('personalDetails')">
                            <i class="fa-regular fa-user ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Personal details</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Information about you</x-text>
                        </li>
                        <li class="u-sidebar-value" data-page="accountSecurity" onclick="loadPage('accountSecurity')">
                            <i class="fa-solid fa-shield-halved ud-icon-left dark:text-white"></i>
                            <i class="fa-solid fa-arrow-right-long dark:text-white"></i>
                            <x-text tag="label" class="dashboard-sidebar-title" color="black"
                                darkColor="gray-100">Account security</x-text><br>
                            <x-text tag="label" class="dashboard-sidebar-sub-title" color="gray-600"
                                darkColor="gray-400">Change your password</x-text>
                        </li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="u-dashboard-content-wrapper">
                    <!-- Dashboard page -->
                    <div id="dashboard" class="ud-page-wrapper">
                        <div class="ud-dashboard-page bg-white dark:bg-gray-800 p-6 rounded shadow">
                            <div class="pl-2 ml-3">
                                <x-text tag="h2" size="2xl" weight="bold" color="customBlue"
                                    darkColor="gray-100" class="text-[40px] font-mainText">
                                    Hello! {{ ucfirst(explode(' ', Auth::user()->name)[0]) }}
                                </x-text>
                                <div class="flex gap-10 text-[#252a34] mb-4 mt-4 font-secondaryText">
                                    <x-text tag="p" size="base" weight="normal" color="gray-700"
                                        darkColor="gray-300">
                                        <i class="fa-regular fa-user mr-2"></i>{{ Auth::user()->name }}
                                    </x-text>

                                    <x-text tag="p" size="base" weight="normal" color="gray-700"
                                        darkColor="gray-300">
                                        <i class="fa-regular fa-envelope mr-2"></i>{{ Auth::user()->email }}
                                    </x-text>

                                    <x-text tag="p" size="base" weight="normal" color="gray-700"
                                        darkColor="gray-300">
                                        <i class="fa-regular fa-calendar mr-2"></i>Member since
                                        {{ Auth::user()->created_at->format('d M Y') }}
                                    </x-text>
                                </div>
                                <x-primary-button onclick="loadPage('personalDetails')">
                                    Edit my details
                                </x-primary-button>
                            </div>
                        </div>

                        <div>
                            <div class="plt-summery ">
                                <a onclick="loadPage('exhibitions')">
                                    <div class="plt-summery-lists">
                                        <div class="absolute top-2 left-2">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summery-title">
                                                Total Adverts
                                            </x-text>
                                        </div>
                                        <div class="flex justify-center items-center h-full">
                                            <p class="summary-amount"></p>
                                        </div>
                                        <div class="summery-icon">
                                            <i class="fa-solid fa-signal"></i>
                                        </div>
                                    </div>
                                </a>
                                <a onclick="loadPage('exhibitions')">
                                    <div class="plt-summery-lists">
                                        <div class="absolute top-2 left-2">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summery-title">
                                                Pending Adverts
                                            </x-text>
                                        </div>
                                        <div class="flex justify-center items-center h-full">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summary-amount">
                                            </x-text>
                                        </div>
                                        <div class="summery-icon">
                                            <i class="fa-solid fa-hourglass-half"></i>
                                        </div>
                                    </div>
                                </a>
                                <a onclick="loadPage('listings')">
                                    <div class="plt-summery-lists">
                                        <div class="absolute top-2 left-2">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summery-title">
                                                Total Listings
                                            </x-text>
                                        </div>
                                        <div class="flex justify-center items-center h-full">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summary-amount">
                                            </x-text>
                                        </div>
                                        <div class="summery-icon">
                                            <i class="fa-solid fa-clipboard-check"></i>
                                        </div>
                                    </div>
                                </a>
                                <a onclick="loadPage('users')">
                                    <div class="plt-summery-lists">
                                        <div class="absolute top-2 left-2">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summery-title">
                                                Total Users
                                            </x-text>
                                        </div>
                                        <div class="flex justify-center items-center h-full">
                                            <x-text tag="h3" size="lg" weight="semibold" color="customBlue"
                                                darkColor="gray-200" class="summary-amount">
                                                {{ $totalUsers }}
                                            </x-text>
                                        </div>
                                        <div class="summery-icon">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- listings page -->
                    <div id="listings" class="ud-page-wrapper hidden">
                        <x-search-bar :text="'Category'" :options="['all' => 'All', 'vendor' => 'Vendor', 'user' => 'User']" :keyword="request('keyword', '')" :placeholder="'Search adverts...'" />
                        <!-- <div class="ud-empty-body">
                                                                                                                                                                                                                        <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                                                                                                                                                                                                                        <h2 class="text-[#6C757D] text-[40px] font-bold">No adverts found</h2>
                                                                                                                                                                                                                        <span class="text-[#6C757D]">We couldn't find any records. Try changing search filters</span>
                                                                                                                                                                                                                        <a href="./createAds.php" class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">Create a new advert</a>
                                                                                                                                                                                                                    </div> -->
                    </div>

                    <!-- users -->
                    <div id="users" class="ud-page-wrapper hidden">

                        @livewire('admin-dashboard.user-tab', ['users' => $users])

                    </div>

                    <!-- admin -->
                    <div id="admin" class="ud-page-wrapper bg-white dark:bg-gray-800 rounded shadow hidden">

                        {{-- create a new admin --}}
                        @livewire('admin.admin-create')

                    </div>

                    <!-- exhibitions -->
                    <div id="exhibitions" class="ud-page-wrapper hidden">
                        <x-search-bar :text="'Status'" :options="[
                            'all' => 'All',
                            'live' => 'Live',
                            'pending' => 'Pending',
                            'rejected' => 'Rejected',
                            'expired' => 'Expired',
                        ]" :keyword="request('keyword', '')" :placeholder="'Search exhibitions...'" />

                        <div>

                        </div>
                    </div>

                    <!-- My presonal details -->
                    <div id="personalDetails" class="ud-page-wrapper hidden">
                        <div class="ud-security-page bg-white dark:bg-gray-800 p-6 rounded shadow">

                            <x-text tag="h2" size="2xl" weight="bold" color="customBlue"
                                darkColor="gray-100" class="text-[50px] mb-3">
                                Your details
                            </x-text>

                            <x-text tag="span" size="base" color="gray-600" darkColor="gray-400"
                                class="block mt-2">
                                Please keep your details up to date. Your personal data is stored securely. We do not share
                                information with third parties.
                            </x-text>

                            {{-- update profile infomation balde --}}
                            @livewire('dashboard.profile-update')
                        </div>
                    </div>

                    <!-- Account security page -->
                    <div id="accountSecurity" class="ud-page-wrapper hidden">
                        <div class="ud-security-page bg-white dark:bg-gray-800 p-6 rounded shadow">
                            <div class="ud-pw-change">
                                <x-text tag="h2" size="2xl" weight="bold" color="customBlue"
                                    darkColor="gray-100" class="text-[50px] mb-5">
                                    Your password
                                </x-text>

                                <x-text tag="span" size="base" color="gray-600" darkColor="gray-400"
                                    class="block mt-2">
                                    Please make sure to have a secure password with at least 8 characters long.
                                </x-text>

                                {{-- change password blade --}}
                                @livewire('dashboard.change-password')

                            </div>
                        </div>
                        <!-- Delete account -->
                        <div class="ud-security-page bg-red-200 dark:bg-gray-800 p-6 rounded shadow">
                            <div class="ud-dlt-acc">
                                <x-text tag="h2" size="2xl" weight="bold" color="[#A82E23]"
                                    darkColor="gray-100" class="text-[50px] mb-5">
                                    Delete account
                                </x-text>
                                <x-text tag="span" size="base" color="gray-800" darkColor="gray-200"
                                    class="block mt-5">
                                    Once your account is deleted, all of its resources and data will be permanently
                                    deleted.
                                    Before deleting your account, please download any data or information that you wish
                                    to
                                    retain.
                                </x-text>
                            </div>
                            {{-- <button type="submit" class="ud-btn mt-3" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Delete my
                                account</button> --}}
                            <x-primary-button class="mt-5" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                Delete my account
                            </x-primary-button>
                        </div>



                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                    <x-text-input id="password" name="password" type="password"
                                        class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Delete Account') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script>
        // Load the dashboard page in mobile view
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });

        // Load the selected page
        function loadPage(page) {
            // Hide all pages
            var pages = document.querySelectorAll('.ud-page-wrapper');
            pages.forEach(function(p) {
                p.classList.add('hidden');
            });

            // Show the selected page if it exists
            var selectedPage = document.getElementById(page);
            if (selectedPage) {
                selectedPage.classList.remove('hidden');
            } else {
                console.error(`Page with id '${page}' not found.`);
                return;
            }

            // Update the active state in the sidebar
            var items = document.querySelectorAll('.u-sidebar-value');
            items.forEach(function(item) {
                item.classList.remove('bg-customBlue', 'text-white');
                var title = item.querySelector('.dashboard-sidebar-title');
                var subTitle = item.querySelector('.dashboard-sidebar-sub-title');
                var icons = item.querySelectorAll('i');
                if (title) {
                    title.classList.remove('text-white');
                }
                if (subTitle) {
                    subTitle.classList.remove('text-white');
                }
                icons.forEach(function(icon) {
                    icon.classList.remove('text-white');
                });
            });

            var activeItem = document.querySelector(`.u-sidebar-value[data-page="${page}"]`);
            if (activeItem) {
                activeItem.classList.add('bg-customBlue', 'text-white');
                var activeTitle = activeItem.querySelector('.dashboard-sidebar-title');
                var activeSubTitle = activeItem.querySelector('.dashboard-sidebar-sub-title');
                var activeIcons = activeItem.querySelectorAll('i');
                if (activeTitle) {
                    activeTitle.classList.add('text-white');
                }
                if (activeSubTitle) {
                    activeSubTitle.classList.add('text-white');
                }
                activeIcons.forEach(function(icon) {
                    icon.classList.add('text-white');
                });
            } else {
                console.error(`Sidebar item with data-page="${page}" not found.`);
            }

            // Update the breadcrumb
            var breadcrumb = document.getElementById('breadcrumb');
            if (breadcrumb) {
                breadcrumb.textContent =
                    ` / ${page.charAt(0).toUpperCase() + page.slice(1).replace(/([A-Z])/g, ' $1').trim()}`;
            } else {
                console.error('Breadcrumb element not found.');
            }
        }

        // Load the default page on initial load
        document.addEventListener('DOMContentLoaded', function() {
            loadPage('dashboard');
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve the redirect section from the server-side session data
            let redirectSection = "{{ session('redirect_section', 'dashboard') }}"; // Default to 'dashboard'

            // Call loadPage with the specified redirect section
            loadPage(redirectSection);
        });


        //change the behaovier in the forms
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent page refresh

            // Get the submit button
            const submitButton = document.getElementById('submitButton');

            // Prepare form data
            const formData = new FormData(this);

            // Send AJAX request
            fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the displayed name and email in the dashboard
                        document.querySelector('.ud-dashboard-page h2').innerText =
                            `Hello! ${data.user.name.split(' ')[0]}`;
                        document.querySelector('.ud-dashboard-page .fa-user').nextSibling.textContent = data
                            .user.name;
                        document.querySelector('.ud-dashboard-page .fa-envelope').nextSibling.textContent = data
                            .user.email;
                        document.querySelector('.ud-dashboard-page .fa-calendar').nextSibling.textContent =
                            `Member since ${data.user.created_at}`;

                        // Update button to show success
                        submitButton.innerText = 'Saved!';
                        submitButton.classList.remove('bg-blue-500');
                        submitButton.classList.add('bg-green-500');
                    } else {
                        alert('Error updating profile. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating your profile.');
                });
        });



        // JavaScript to toggle the sidebar on mobile view
        document.getElementById('menuToggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar.style.display === 'block') {
                sidebar.style.display = 'none';
            } else {
                sidebar.style.display = 'block';
            }
        });
    </script>
@endsection
