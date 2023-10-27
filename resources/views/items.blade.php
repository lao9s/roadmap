@section('title', trans('feature-requests.all-feature-requests'))

<x-app :breadcrumbs="[
    ['title' => trans('feature-requests.all-feature-requests'), 'url' => route('items')]
]">
    <div class="space-y-6">
        <div class="grid grid-cols-1 gap-4">
            <div class="space-y-2">
                <h2 class="text-lg tracking-tight font-bold">{{ trans('feature-requests.all-feature-requests') }}</h2>
                <p class="text-gray-500 text-sm">{{ trans('feature-requests.all-feature-requests-description') }}</p>
                <livewire:items />
            </div>
        </div>
    </div>
</x-app>
