<?php

use App\Http\Controllers\MBTIController;
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

Route::get('/', [MBTIController::class, 'index'])->name('index');
Route::post('/start-test', [MBTIController::class, 'startTest'])->name('test.start');
Route::get('/mbti-test/{code}', [MBTIController::class, 'showQuestion'])->name('test.question');
Route::post('/mbti-test/{code}', [MBTIController::class, 'submitAnswer'])->name('test.submit');
Route::get('/score/{score}', [MBTIController::class, 'showScoreInfo'])->name('test.score');
