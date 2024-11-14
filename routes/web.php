<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PackageController;
use App\Exports\PackagesExport;
use Maatwebsite\Excel\Facades\Excel;

Route::post('/package', [PackageController::class, 'store']);

Route::get('/packages/export', function() {
    return Excel::download(new PackagesExport, 'packages.xlsx');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::get('/packages', [PackageController::class, 'index']);


