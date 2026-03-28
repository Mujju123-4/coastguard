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
    $user = auth()->user();
    $isAdmin = $user->hasRole('Admin');

    $notices = \App\Models\Notice::where('is_active', true)
        ->latest('published_at')
        ->limit(10)
        ->get();
    
    $itemQuery = \App\Models\ItemMaster::query();
    $locationQuery = \App\Models\Location::query();
    $userQuery = \App\Models\User::query();

    if (!$isAdmin) {
        $itemQuery->where('location_id', $user->location_id);
        $locationQuery->where('id', $user->location_id);
        // For users, maybe only count users in the same location
        $userQuery->where('location_id', $user->location_id);
    }

    $stats = [
        'items' => $itemQuery->count(),
        'locations' => $locationQuery->count(),
        'users' => $userQuery->count(),
        'last_item' => $itemQuery->latest()->first(),
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
