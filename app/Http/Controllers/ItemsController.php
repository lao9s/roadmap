<?php

namespace App\Http\Controllers;

class ItemsController extends Controller
{
    public function __invoke()
    {
        return view('items');
    }
}
