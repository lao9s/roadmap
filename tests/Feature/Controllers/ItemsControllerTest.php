<?php

use App\Http\Livewire\Items;
use function Pest\Laravel\get;

test('it renders view', function () {
    get(route('items'))->assertOk();
});

test('it shows breadcrumbs', function () {
    get(route('items'))->assertSee('All items');
});

test('view has live components', function ($component) {
    get(route('items'))->assertSeeLivewire($component);
})->with([
    'Items' => Items::class
]);
