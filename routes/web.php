<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ItemMasterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $notices = \App\Models\Notice::where('is_active', true)
        ->latest('published_at')
        ->limit(10)
        ->get();
    
    $stats = [
        'items' => \App\Models\ItemMaster::count(),
        'locations' => \App\Models\Location::count(),
        'users' => \App\Models\User::count(),
        'last_item' => \App\Models\ItemMaster::latest()->first(),
    ];

    return view('dashboard', compact('notices', 'stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('notices', NoticeController::class);
    Route::get('item-masters/import', [ItemMasterController::class, 'import'])->name('item-masters.import');
    Route::post('item-masters/import', [ItemMasterController::class, 'upload'])->name('item-masters.upload');
    Route::resource('item-masters', ItemMasterController::class);
});

require __DIR__.'/auth.php';
