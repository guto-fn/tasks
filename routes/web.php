<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/edit', function () {
    // Retorne a view de edição de perfil
    return view('profile.edit');
})->name('profile.edit');

Route::get('/login', function () {
    return 'Página de login (ainda não implementada)';
})->name('login');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Ou para onde quiser redirecionar após logout
})->name('logout');


Route::get('/dashboard', [ProjectsController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    return redirect()->route('projects.index');
});
Route::get('/create', [ProjectsController::class, 'create'])->name('create');
Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('edit');

Route::resource('projects', ProjectsController::class);
