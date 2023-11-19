<li class="pb-5 pt-5 first:pt-0 group">
    <div class="flex space-x-3">
        <div class="flex flex-col text-center space-y-1">
            <button wire:click="toggleUpvote" class="hover:text-primary-500">
                <x-heroicon-o-chevron-up class="w-5 h-5"/>
            </button>

            <span class="">{{ $item->total_votes }}</span>
        </div>

        <div class="flex-1">
            @php
                $url = $project ? route('projects.items.show', [$project, $item]) : route('items.show', $item);
            @endphp

            <a href="{{ $url }}" class="flex-1">
                <p class="font-medium text-lg group-hover:text-brand-500">{{ $item->title }}</p>
                <p class="break-all md:break-normal">{{ $item->excerpt }}</p>
                <div class="mt-2">
                    @if($item->board)
                        <x-badge :type="match ($item->board->title) {
                                'In progress' => 'info',
                                'Planned' => 'warning',
                                'Completed' => 'success',
                                default => 'dark',
                            }">
                            {{ $item->board->title }}
                        </x-badge>
                    @else
                        <x-badge class="mt-2">
                            Suggested
                        </x-badge>
                    @endif
                </div>
            </a>
        </div>

        <div class="flex space-x-2">
            @if($item->isPrivate())
                <span x-data x-tooltip.raw="{{ trans('items.item-private') }}">
                    <x-heroicon-s-lock-closed class="text-gray-500 fill-gray-500 w-5 h-5"/>
                </span>

                <span>&centerdot;</span>
            @endif

            @if($item->isPinned())
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                     x-data
                     x-tooltip.raw="{{ trans('items.item-pinned') }}"
                     class="text-gray-500 fill-gray-500">
                    <path
                        d="M15 11.586V6h2V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2h2v5.586l-2.707 1.707A.996.996 0 0 0 6 14v2a1 1 0 0 0 1 1h4v3l1 2 1-2v-3h4a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L15 11.586z"></path>
                </svg>

                <span>&centerdot;</span>
            @endif

            <span>
               <a href="{{ $url }}#comments" class="flex items-center space-x-1 text-gray-500">
                   <span>{{ $item['comments_count'] }}</span>
                   <x-icons.chat-bubble-left/>
               </a>
            </span>
        </div>
    </div>
</li>
