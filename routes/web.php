<?php

use App\Http\Controllers\TarjetaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/* Route::get('/', function(){
    return view('welcome');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Route::get('/home/{tarjeta}', [TarjetaController::class, 'show'])->name('tarjetas.show');
 */
Route::resource('tarjetas', TarjetaController::class)->names('tarjetas');

Route::resource('users', 'UsersController');

/* Route::get('/artisan/cache', function(){
    Artisan::call('config:cache');
    return redirect('/');
});

Route::get('/artisan/cache', function(){
    Artisan::call('migrate:fresh --seed');
    return redirect('/');
}); */

