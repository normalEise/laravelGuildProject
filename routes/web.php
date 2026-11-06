<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('guilds.index');
});

Route::get('/guilds', [GuildController::class, 'index'])->name('guilds.index');
Route::get('/guilds/create', [GuildController::class, 'create'])->name('guilds.create');
Route::post('/guilds', [GuildController::class, 'store'])->name('guilds.store');
Route::get('/guilds/{guild}/edit', [GuildController::class, 'edit'])->name('guilds.edit');
Route::put('/guilds/{guild}', [GuildController::class, 'update'])->name('guilds.update');
Route::delete('/guilds/{guild}', [GuildController::class, 'destroy'])->name('guilds.destroy');

Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');