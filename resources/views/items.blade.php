@section('title', trans('items.all-items'))

<x-app :breadcrumbs="[
    ['title' => trans('items.all-items'), 'url' => route('items')]
]">
    <div class="space-y-6">
        <div class="grid grid-cols-1 gap-4">
            <div class="space-y-2">
                <h2 class="text-lg tracking-tight font-bold">{{ trans('items.all-items') }}</h2>
                <p class="text-gray-500 text-sm">{{ trans('items.all-items-description') }}</p>
                <livewire:items />
            </div>
        </div>
    </div>
</x-app>
