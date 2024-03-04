<?php

use Illuminate\Support\Facades\Route;

Route::get('items', function () {
    return redirect(route('home'), 301);
});

Route::get('changelog', function () {
    return redirect(route('home'), 301);
});

Route::get('items/18-support-google-business-profile', function () {
    return redirect(route('home'), 301);
});

Route::get('items/92-your-health-journey-your-story', function () {
    return redirect(route('home'), 301);
});
