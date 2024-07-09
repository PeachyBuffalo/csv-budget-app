<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ($subdomain) {
    return "Welcome to the subdomain: $subdomain";
});
