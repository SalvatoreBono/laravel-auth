<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guests.welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::resource("projects", ProjectController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

////////////////////////////////////////////ESEMPI////////////////////////////////////////////

//Genera tutte le Route
// Route::resource("comics", ComicController::class);

// ROTTE CRUD COMICS

// CREATE
//Route::get('/comics/create', [ComicController::class, "create"])->name("comics.create");
//Route::post('/comics', [ComicController::class, "store"])->name("comics.store");

// READ
//Route::get('/comics', [ComicController::class, "index"])->name("comics.index");
//Route::get('/comics/{id}', [ComicController::class, "show"])->name("comics.show");

// UPDATE
//Route::get('/comics/{id}/edit', [ComicController::class, "edit"])->name("comics.edit");
//Route::put('/comics/{id}', [ComicController::class, "update"])->name("comics.update");

// DESTROY
//Route::delete('/comics/{id}', [ComicController::class, "destroy"])->name("comics.destroy");