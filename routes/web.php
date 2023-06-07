<?php

use App\Http\Controllers\WhatsappController;
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

Route::get('/', function () {
    return view('welcome');
});

/* Route::post('/whatsapp', [WhatsappController::class, 'sendMessage'])->name('whatsapp.store'); */
Route::post('whatsapp/enviar-mensaje', [WhatsAppController::class, 'sendMessage'])->name('whatsapp.store');

