<div>
    <x-search-bar :text="'Status'" :options="['all' => 'All', 'pendding' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected', 'active' => 'Active', 'deactive' => 'Deactive']" :keyword="request('keyword', '')" :placeholder="'Search by name, model, location...'" />
       <!-- User Cards -->
    @if (auth()->user()->role == 'user')
        <div class="my-4">
            @if(count($listings) > 0)
            <ul>
                @foreach ($listings as $listing)
                    <li wire:key="{{ $listing->id }}">
                        <div class="my-4">
                            @livewire('user.user-advert-card', ['listing' => $listing], key('listing-' . $listing->id))
                        </div>
                    </li>
                @endforeach
            </ul>
            @else
                <div class="ud-empty-body flex flex-col items-center justify-center gap-4 py-10">
                    <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                    <x-text tag="h2" size="4xl" weight="bold" color="[#6C757D]">No adverts found</x-text>
                    <x-text tag="span" color="[#6C757D]">We couldn't find any records. Try changing search filters</x-text>
                    <a href="{{ route('pages.advert-form') }}" 
                       class="border bg-customRed text-white px-7 py-2 rounded-[50px] hover:shadow-4xl transition-all duration-300 ease-in-out"> Create a new advert
                    </a>
                </div>
            @endif
        </div>
    @endif
    
    <!-- Admin Cards -->
    @if (auth()->user()->role == 'admin')
        @if(count($listings) > 0)
            <ul>
                @foreach ($listings as $listing)
                    <li wire:key="{{ $listing->id }}">
                        <div class="my-4">
                            @livewire('admin.admin-advert-card', ['listing' => $listing], key('listing-' . $listing->id))
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="ud-empty-body flex flex-col items-center justify-center gap-4 py-10">
                <i class="fa-solid fa-magnifying-glass text-[#6C757D] text-[80px]"></i>
                <x-text tag="h2" size="4xl" weight="bold" color="[#6C757D]">No adverts found</x-text>
                <x-text tag="span" color="[#6C757D]">We couldn't find any records. Try changing search filters</x-text>
            </div>
        @endif
    @endif

    <div class="pagination">
        {{ $listings->links() }} 
    </div>
</div>
