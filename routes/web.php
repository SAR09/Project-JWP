<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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
    return view('beranda');
})->name('beranda');

Route::get('/member/list', [MemberController::class, 'list'])->name('member.list');
Route::get('/member/form', [MemberController::class, 'toAdd'])->name('tambah.member');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/{member}/edit', [MemberController::class, 'toEdit'])->name('member.edit');
Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/list/{member}', [MemberController::class ,'hapus'])->name('member.hapus');

