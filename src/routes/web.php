<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PropertyController;
Use App\Models\Customer;


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


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
   
});

Route::match(['get'], '/customers/{id?}', [CustomerController::class, 'index'])->name('customers');

Route::post('/customers/save', [CustomerController::class, 'store'])->name('saveCustomer');

Route::post('/customers/edit', [CustomerController::class, 'edit'])->name('editCustomer');


Route::get('/customers/delete/{CutomerId?}', [CustomerController::class, 'delete'])->name('deleteCustomer');


Route::get('/properties', [PropertyController::class, 'index'])->name('properties');

Route::post('/property/save', [PropertyController::class, 'store'])->name('saveProperty');

Route::post('/property/edit', [PropertyController::class, 'edit'])->name('editProperty');

Route::get('/property/delete/{propertyId?}', [PropertyController::class, 'delete'])->name('deleteProperty');
