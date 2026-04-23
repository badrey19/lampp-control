<?php

use App\Models\Relay;
use Illuminate\Support\Facades\Route;

// GET status
Route::get('/relay', function () {
    $relay = Relay::first();

    if (!$relay) {
        return response()->json(['status' => 0]);
    }

    return response()->json([
        'status' => $relay->status
    ]);
});

Route::post('/relay/{state}', function ($state) {
    $relay = Relay::first();

    if (!$relay) {
        $relay = Relay::create([
            'name' => 'Lampu',
            'status' => $state
        ]);
    } else {
        $relay->status = $state;
        $relay->save();
    }

    return ['success' => true];
});

Route::get('/', function () {
    return view('relay');
});