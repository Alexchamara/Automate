{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout> --}}

@extends('layouts.app')
@section('pages')

<main class="user-dashboard-main-container">
    <!-- upper section -->
    <div class="dashboard-path-wrapper">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-600 mb-4">
            <a href="#" class="text-customBlue hover:underline" onclick="loadPage('dashboard')">Dashboard</a>
            <span id="breadcrumb"> / Dashboard</span>
        </div>
        <!-- Sign out btn -->
        <div class="text-sm mb-4">
            <a href="#" class="text-customBlue hover:underline">Sign out<i class="fa-solid fa-arrow-right-from-bracket ml-1"></i></a>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="user-dashboard-wrapper">
        <!-- Navbar for mobile -->
        <div class="bg-customBlue text-white p-4 flex justify-between items-center lg:hidden">
            <div class="text-lg font-bold">Dashboard</div>
            <button id="menuToggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar for desktop -->
        <div id="sidebar" class="dashboard-sidebar-desktop-wrapper">
            <ul class="dashboard-sidebar-options flex flex-col">
                <li class="u-sidebar-value rounded-t-md hover:rounded-t-md" data-page="dashboard" onclick="loadPage('dashboard')">
                    <i class="fa-regular fa-address-card ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="dashboard" class="dashboard-sidebar-title">Dashboard</label><br>
                    <span class="dashboard-sidebar-sub-title">Summary of your account</span>
                </li>
                <li class="u-sidebar-value" data-page="myAdverts" onclick="loadPage('myAdverts')">
                    <i class="fa-solid fa-rectangle-ad ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My adverts</label><br>
                    <span class="dashboard-sidebar-sub-title">Vehicles you are selling</span>
                </li>
                <li class="u-sidebar-value" data-page="myMessages" onclick="loadPage('myMessages')">
                    <i class="fa-regular fa-envelope ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My messages</label><br>
                    <span class="dashboard-sidebar-sub-title">Send and receive messages</span>
                </li>
                <li class="u-sidebar-value" data-page="notifications" onclick="loadPage('notification')">
                    <i class="fa-regular fa-bell ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Notification</label><br>
                    <span class="dashboard-sidebar-sub-title">Receive notifications</span>
                </li>
                <li class="u-sidebar-value" data-page="savedAdverts" onclick="loadPage('savedAdverts')">
                    <i class="fa-regular fa-heart ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Saved adverts</label><br>
                    <span class="dashboard-sidebar-sub-title">Ads you have saved for later</span>
                </li>
                <li class="u-sidebar-value" data-page="myOrders" onclick="loadPage('myOrders')">
                    <i class="fa-solid fa-bag-shopping ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">My orders</label><br>
                    <span class="dashboard-sidebar-sub-title">View all your orders</span>
                </li>
                <li class="u-sidebar-value" data-page="personalDetails" onclick="loadPage('personalDetails')">
                    <i class="fa-regular fa-user ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Personal details</label><br>
                    <span class="dashboard-sidebar-sub-title">Information about you</span>
                </li>
                <li class="u-sidebar-value rounded-b-md hover:rounded-b-md border-none" data-page="accountSecurity" onclick="loadPage('accountSecurity')">
                    <i class="fa-solid fa-shield-halved ud-icon-left"></i>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <label for="myAdvert" class="dashboard-sidebar-title">Account security</label><br>
                    <span class="dashboard-sidebar-sub-title">Change your password</span>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="u-dashboard-content-wrapper">
            <!-- Dashboard page -->
            <div id="dashboard" class="ud-page-wrapper hidden">
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Hello! Alex</h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <p class="mt-2"><i class="fa-regular fa-user mr-2"></i>Alex Chamara</p>
                        <p class="mt-2"><i class="fa-regular fa-envelope mr-2"></i>alexhmara76@gmail.com</p>
                        <p class="mt-2"><i class="fa-regular fa-calendar mr-2"></i>Member since 19 Aug 2024</p>
                    </div>
                    <button class="ud-btn" onclick="loadPage('personalDetails')">Edit my details</button>
                </div>
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Find your next car</h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <p class="mt-2">We are the fastest growing largest digital automotive marketplace in Sri Lanka.</p>
                    </div>
                    <a href="./advertListing.php" class="ud-btn">Browse latest car</a>
                </div>
                <div class="ud-dashboard-page">
                    <h2 class="text-[40px] font-bold text-customBlue">Looking to sell your car?</h2>
                    <div class="flex gap-10 text-[#252a34] mb-4">
                        <p class="mt-2">Make more money by selling your car with Automate 3 easy steps!</p>
                    </div>
                    <a href="./createAds.php" class="ud-btn">Create your advert</a>
                </div>
            </div>

            <!-- My advert page -->
            <div id="myAdverts" class="ud-page-wrapper hidden">
                <div class="ud-advert-page">
                    <div class="ud-advert-status-wrapper flex-[25%]">
                        <p class="mt-2 mb-2"></i>Status</p>
                        <select name="" id="" class="border border-[#00000026] rounded-[5px]">
                            <option value="all">All</option>
                            <option value="live">Live</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="ud-advert-keyword-wrapper flex-[50%]">
                        <p class="mt-2 mb-2"></i>Keyword</p>
                        <div class="flex">
                            <input type="text" class="ud-advert-keyword-input" placeholder="Search adverts...">
                            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>
                <div class="ud-empty-body">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <h2 class="text-[#6C757D] text-[40px] font-bold">No adverts found</h2>
                    <span class="text-[#6C757D]">We couldn't find any records. Try changing search filters</span>
                    <a href="./createAds.php" class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">Create a new advert</a>
                </div>
            </div>

            <div id="myMessages" class="ud-page-wrapper bg-white p-6 rounded shadow hidden">
                <h2 class="text-2xl font-bold text-blue-900">My messages</h2>
                <p class="mt-2">Your messages.</p>
            </div>

            <!-- Saved ad page -->
            <div id="savedAdverts" class="ud-page-wrapper hidden">
                <div class="ud-saved-advert-page">
                    <div class="ud-advert-keyword-wrapper flex-[50%]">
                        <p class="mt-2 mb-2"></i>Keyword</p>
                        <div class="flex">
                            <input type="text" class="ud-advert-keyword-input" placeholder="Search adverts...">
                            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>

                <?php
                // Assuming $savedAds is an array containing saved ads
                $savedAds = [1, 2]; // Replace this with actual data fetching logic

                if (count($savedAds) > 0): ?>
                    <div class="ud-savedAd-container">
                        <ul>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- empty body -->
                    <div class="ud-empty-body">
                        <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                        <h2 class="text-[#6C757D] text-[40px] font-bold">No saved adverts found</h2>
                        <span class="text-[#6C757D]">We couldn't find any saved adverts. Try changing search filters.</span>
                        <a href="./advertListing.php" class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out">Show latest adverts</a>
                    </div>
                <?php endif; ?>
            </div>

            <div id="myOrders" class="ud-page-wrapper bg-white p-6 rounded shadow hidden">
                <h2 class="text-2xl font-bold text-blue-900">My orders</h2>
                <p class="mt-2">Your orders.</p>
            </div>
            <div id="personalDetails" class="ud-page-wrapper bg-white p-6 rounded shadow hidden">
                <h2 class="text-2xl font-bold text-blue-900">Personal details</h2>
                <p class="mt-2">Your personal details.</p>
            </div>

            <!-- Account security page -->
            <div id="accountSecurity" class="ud-page-wrapper">
                <div class="ud-security-page">
                    <div class="ud-pw-change">
                        <h2 class="text-[50px] font-bold text-customBlue">Your password</h2>
                        <span>Please make sure to have a secure password with at least 6 characters long.</span>
                        <form action="" method="post" class="mt-4">
                            <div class="mb-4">
                                <label for="currentPassword" class="block text-sm font-medium text-gray-700">Current password</label>
                                <input type="password" name="currentPassword" id="currentPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="newPassword" class="block text-sm font-medium text-gray-700">New password</label>
                                <input type="password" name="newPassword" id="newPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                            <button type="submit" class="ud-btn">Change password</button>
                        </form>
                    </div>
                </div>
                <div class="ud-security-page">
                    <h2 class="text-2xl font-bold text-blue-900">Account security</h2>
                    <p class="mt-2">Change your password.</p>
                </div>
            </div>
        </div>
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
                item.classList.remove('bg-customBlue');
            });

            var activeItem = document.querySelector(`.u-sidebar-value[data-page="${page}"]`);
            if (activeItem) {
                activeItem.classList.add('bg-customBlue');
            } else {
                console.error(`Sidebar item with data-page="${page}" not found.`);
            }

            // Update the breadcrumb
            var breadcrumb = document.getElementById('breadcrumb');
            if (breadcrumb) {
                breadcrumb.textContent = ` / ${page.charAt(0).toUpperCase() + page.slice(1).replace(/([A-Z])/g, ' $1').trim()}`;
            } else {
                console.error('Breadcrumb element not found.');
            }
        }
    </script>
</main>

@endsection
