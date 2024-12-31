<div>
    <x-search-bar :text="'Users'" :options="['all' => 'All', 'user' => 'User', 'admin' => 'Admin']" :keyword="request('keyword', '')" :placeholder="'Search users...'" />

        {{-- User card --}}
        @if (isset($users) && $users->count() > 0)
            @foreach ($users as $user)
                <div class="my-4">
                    @livewire('admin.user-card', ['user' => $user])
                </div>
            @endforeach
        @else
            <div class="ud-empty-body">
                <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                <h2 class="text-[#6C757D] text-[40px] font-bold">No users found</h2>
                <span class="text-[#6C757D]">We couldn't find any records. Try changing search
                    filters</span>
            </div>
        @endif
</div>
