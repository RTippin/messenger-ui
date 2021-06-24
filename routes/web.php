<?php

use Illuminate\Support\Facades\Route;
use RTippin\MessengerUi\Http\Controllers\ViewPortalController;

/*
|--------------------------------------------------------------------------
| Messenger WEB Routes
|--------------------------------------------------------------------------
*/

Route::name('messenger.')->group(function () {
    Route::get('/', [ViewPortalController::class, 'index'])->name('portal');
    Route::get('{thread}', [ViewPortalController::class, 'showThread'])->name('show');
    Route::get('/recipient/{alias}/{id}', [ViewPortalController::class, 'showCreatePrivate'])->name('private.create');
    Route::get('threads/{thread}/calls/{call}', [ViewPortalController::class, 'showVideoCall'])->name('threads.show.call');
});
