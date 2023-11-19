<div class="w-full md:space-x-10 h-full flex items-start box-border" id="feedback">
    <div class="flex-1 h-full col-span-6 lg:col-span-5 lg:pr-5">
        <div class="bg-white shadow-default rounded-xl">
            <div class="h-full relative flex-1">
                <div class="absolute ml-2 h-full left-0 right-0 top-0 bottom-0 flex items-center justify-center w-10">
                    <x-icons.magninifying-glass class="!w-6 !h-6"/>
                </div>

                <input wire:model.defer="search"
                       wire:keydown.debounce.300ms="resetPage"
                       type="text"
                       name="search"
                       placeholder="{{ trans('general.search') }}"
                       class="pl-12 z-10 px-8 py-5 rounded-xl border-none focus:ring focus:ring-brand-500 outline-none transition-colors ease-in-out duration-200 w-full"/>
            </div>
        </div>

        @if($items->count())
            <x-card class="md:hidden my-5 sticky top-20">
                <div class="flex justify-around items-center space-x-2">
                    <div class="w-full">
                        <x-forms.label for="sort-by">Sort By</x-forms.label>
                        <x-forms.select wire:model="sortBy" wire:change="resetPage" id="sort-by" class="mt-1">
                            <option value="top">Top</option>
                            <option value="newest">Newest</option>
                        </x-forms.select>
                    </div>

                    <div class="w-full">
                        <x-forms.label for="filter">Filter</x-forms.label>
                        <x-forms.select wire:model="filter" wire:change="resetPage" id="filter" class="mt-1">
                            <option value="all">All</option>
                            <option value="all_not_completed">All (not completed)</option>
                            @auth
                                <option value="my">My feature requests</option>
                            @endauth
                            <option value="suggested">Suggested</option>
                            <option value="planned">Planned</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </x-forms.select>
                    </div>
                </div>
            </x-card>
        @endif

        <x-card class="mt-10">
            @if($items->count())
                <ul class="w-full divide-y pr-10">
                    @foreach($items as $item)
                        <livewire:project.item-card :item="$item" :wire:key="time().$item->id"/>
                    @endforeach
                </ul>
            @else
                <div class="w-full">
                    <div
                        class="flex flex-col items-center justify-center p-6 mx-auto space-y-6 text-center">
                        <div
                            class="flex items-center justify-center w-16 h-16 text-blue-500 bg-white rounded-full shadow">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5"
                                      d="M5.75 12.8665L8.33995 16.4138C9.15171 17.5256 10.8179 17.504 11.6006 16.3715L18.25 6.75"/>
                            </svg>
                        </div>

                        <header class="space-y-2">
                            <h2 class="text-xl font-semibold tracking-tight">{{ trans('items.no-results') }}</h2>

                            <x-button onclick="Livewire.emit('openModal', 'modals.item.create-item-modal')">
                                {{ trans('feature-requests.want-submit-feature-request') }}
                            </x-button>
                        </header>
                    </div>
                </div>
            @endif
        </x-card>


        @if($items->hasPages())
            <div class="mt-10">
                {{ $items->links() }}
            </div>
        @endif
    </div>

    <div class="hidden lg:block sticky top-28">
        <aside class="w-60 sticky" aria-label="Sidebar">
            <div>
                <div class="mb-1">Sort by</div>

                <div class="flex flex-col items-start space-y-2">
                    <label for="sort_by_top" class="flex items-center">
                        <x-forms.radio wire:model="sortBy" wire:change="resetPage" value="top" id="sort_by_top"/>
                        Top</label>

                    <label for="sort_by_newest" class="flex items-center">
                        <x-forms.radio wire:model="sortBy" wire:change="resetPage" value="newest" id="sort_by_newest"/>
                        Newest</label>
                </div>
            </div>

            <div class="mt-10">
                <div class="mb-1">Filter</div>

                <div class="flex flex-col items-start space-y-2">
                    <label for="filter_all" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="all" id="filter_all"/>
                        All</label>

                    <label for="filter_all_not_completed" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="all_not_completed"
                                       id="filter_all_not_completed"/>
                        All (not completed)</label>

                    @auth
                        <label for="filter_my" class="flex items-center">
                            <x-forms.radio wire:model="filter" wire:change="resetPage" value="my" id="filter_my"/>
                            My feature requests</label>
                    @endauth

                    <label for="filter_suggested" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="suggested"
                                       id="filter_suggested"/>
                        Suggested</label>

                    <label for="filter_planned" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="planned" id="filter_planned"/>
                        Planned</label>

                    <label for="filter_in_progress" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="in_progress"
                                       id="filter_in_progress"/>
                        In Progress</label>

                    <label for="filter_completed" class="flex items-center">
                        <x-forms.radio wire:model="filter" wire:change="resetPage" value="completed"
                                       id="filter_completed"/>
                        Completed</label>
                </div>
            </div>
        </aside>
    </div>

    <script>
        window.addEventListener('scroll-to-top', ()=> {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        })
    </script>
</div>
