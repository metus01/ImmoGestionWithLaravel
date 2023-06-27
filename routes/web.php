<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;

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

$id_regex = '^[0-9]+';
$slug_regex = '^[0-9a-z\-]+';
Route::get('/', [HomeController::class, 'index']);

Route::get('/biens', [PropertiesController::class, 'index'])->name("property.index");
Route::get(
    '/biens/{slug}-{property}',
    [PropertiesController::class, 'show']
)->name('property.show')->where(
    [
        'property' => $id_regex,
        'slug' => $slug_regex
    ]
);
// Route::post('/biens/{slug}-{property}',[PropertiesController::class , 'contact'])->name('property.contact');
// Route::post(
//     '/biens/{slug}-{property}',
//     [PropertiesController::class, 'contact']
// )->name('property.contact')->where(
//     [
//         'property' => $id_regex,
//     ]
// );
// Route::get(
//     '/biens/{property}/{contact}',
//     [
//         PropertiesController::class, 'contact'
//     ]
// )->name('property.contact')->where(
//     [
//         'property ' => $id_regex
//     ]
// );
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except([
        'show'
    ]);
    Route::resource('option', OptionController::class)->except('show');
});
Route::get('/login' , [AuthController::class , 'login'])->name('auth.login')->middleware('guest'); 
Route::post('/login' , [AuthController::class , 'doLogin'])->name('login');
Route::delete('/logout' , [AuthController::class , 'logout'])->name('logout')->middleware('auth');
