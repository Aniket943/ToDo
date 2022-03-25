<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\todocontroller;
use App\Http\Controllers\UserController;

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
    return redirect(route('login'));
});

Route::get('/about', function () {
    return view('About');
})->name('aboutpage');

Route::middleware(['auth:sanctum', 'verified'])->get('/todolist', [todocontroller::class, 'AllList'])->name('todolist');
Route::middleware(['auth:sanctum', 'verified'])->post('/todolist/create_new', [todocontroller::class, 'AddEditItem'])->name('todolist.add');
Route::middleware(['auth:sanctum', 'verified'])->get('/todolist/{id}/edit', [todocontroller::class, 'AllList'])->name('todolist.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/todolist/{id}/update', [todocontroller::class, 'AddEditItem'])->name('todolist.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/todolist/{id}/delete', [todocontroller::class, 'DeleteItem'])->name('todolist.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/todolist/{id}/markcompleted', [todocontroller::class, 'MarkCompletedItem'])->name('todolist.markcompleted');

Route::middleware(['auth:sanctum', 'verified'])->get('/userlist', function () {
  // $users = User::paginate(5);
    return view('userlist');
})->name('userlist');

Route::middleware(['auth:sanctum', 'verified'])->get('/userlist/{uid}/edit', [UserController::class, 'EditUser'])->name('useredit');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

