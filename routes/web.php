<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserManualController;
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
    Route::get('item-masters/export', [ItemMasterController::class, 'exportCsv'])->name('item-masters.export');
    Route::resource('item-masters', ItemMasterController::class);

    // Ticket routes
    Route::post('tickets',                      [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/notifications',         [TicketController::class, 'notifications'])->name('tickets.notifications');
    Route::get('tickets/{id}/replies',          [TicketController::class, 'getReplies'])->name('tickets.replies.index');
    Route::post('tickets/{id}/replies',         [TicketController::class, 'addReply'])->name('tickets.replies.store');
    Route::post('tickets/{id}/close',           [TicketController::class, 'close'])->name('tickets.close');


    ///Equipment//
    Route::get('equipment',              [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('equipment/create',       [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('equipment',             [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('equipment/{id}/edit',    [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('equipment/{id}',         [EquipmentController::class, 'update'])->name('equipment.update');
    ///Equipment//

    // User Manual Routes
    Route::resource('user-manuals', UserManualController::class);
    Route::get('user-manuals/{user_manual}/view', [UserManualController::class, 'view'])->name('user-manuals.view');
    Route::get('user-manuals/{user_manual}/download', [UserManualController::class, 'download'])->name('user-manuals.download');
});

require __DIR__.'/auth.php';
