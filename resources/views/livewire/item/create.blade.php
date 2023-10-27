<div>
    <h3 class="mb-3">{{ trans('feature-requests.submit-feature-request') }}</h3>

    <form wire:submit.prevent="submit" class="space-y-5">
        {{ $this->form }}

        <x-filament::button wire:click="submit">
            {{ trans('feature-requests.submit-feature-request') }}
        </x-filament::button>
    </form>
</div>
