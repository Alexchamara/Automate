@props(['text', 'options', 'keyword', 'placeholder'])

<div class="ud-advert-page bg-white dark:bg-gray-800 p-6 rounded shadow">
    <div class="ud-advert-status-wrapper flex-[25%]">
        <x-input-label :for="'search-input'" :value="$text" />
        <!-- <p class="mt-2 mb-2"></i>Status</p> -->
        <x-select :options="$options" class="mt-2 dark:border-white"/>
    </div>
    <div class="ud-advert-keyword-wrapper flex-[50%]">
        {{-- <p class="mt-2 mb-2"></i>Keyword</p> --}}
        <x-input-label for="role" :value="__('Keyword')"/>
        <div class="flex mt-2">
            <x-text-input :value="$keyword" type="text" :placeholder="$placeholder" class="ud-advert-keyword-input" class="dark:border-white border-y border-l rounded-r-none"/>
            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass dark:bg-gray-800 dark:text-white dark:border-white"></i></a>
        </div>
    </div>
</div>