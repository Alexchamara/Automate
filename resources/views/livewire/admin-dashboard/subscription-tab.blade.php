<div>
    <div class="ud-dashboard-page bg-white dark:bg-gray-800 p-6 rounded shadow">
        <x-text tag="h2" size="5xl" weight="bold" color="customBlue" darkColor="gray-100" class="mb-3">
            Subscriptions
        </x-text>

        <x-text tag="span" size="base" color="gray-600" darkColor="gray-400">
            Manage all subscriptions efficiently by adding, editing, or deleting subscriptions to organize your
            subscriptions effectively.
        </x-text>

        <div class="flex justify-center mt-3">
            <button wire:click="setActiveTab('tab1')"
                class="tab-link px-4 py-2 transition-colors duration-200 font-semibold {{ $activeTab === 'tab1' ? 'text-customBlue dark:border-b dark:border-white' : 'text-gray-500 hover:text-customBlue' }}">
                <x-text tag="span" size="base" weight="semibold">
                    Manage Subscriptions
                </x-text>
            </button>
            <button wire:click="setActiveTab('tab2')"
                class="tab-link px-4 py-2 transition-colors duration-200 font-semibold {{ $activeTab === 'tab2' ? 'text-customBlue dark:border-b dark:border-white' : 'text-gray-500 hover:text-customBlue' }}">
                <x-text tag="span" size="base" weight="semibold">
                    Add Subscription
                </x-text>
            </button>
        </div>
    </div>

    <div id="tab1" class="tab-content" style="display: {{ $activeTab === 'tab1' ? 'block' : 'none' }}">
        @livewire('admin.subscription-card')
    </div>
    
    <div id="tab2" class="tab-content" style="display: {{ $activeTab === 'tab2' ? 'block' : 'none' }}">
        @livewire('admin.subscription-form')
    </div>

    {{-- <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
    </script> --}}
</div>
