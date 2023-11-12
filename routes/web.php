<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('welcome');
});

// List contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Show the form for creating a new contact
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Store a newly created contact in the database
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Show the form for editing a contact
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

// Update the specified contact in the database
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

// Delete the specified contact from the database
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');