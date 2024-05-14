<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    //return view('welcome');

    //$resEncrypt = encrypt('Password123', true);
    //dd($resEncrypt);
    // eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=
    //$resDecrypt = decrypt('eyJpdiI6IkR6WGhrV205bTVnMGFyakd2ZEhEenc9PSIsInZhbHVlIjoieU9VYys3YWdGeEdML0NBRWxXN0ZTZUZ4cDFYVUxxdGJDUHpOeDFoSmVzaz0iLCJtYWMiOiJlOWVhMzY2MTgyNmViYTk2MTBiYWQ3Zjc1NDExMDZmMWU2MjM5ZTVjYjM5MzA2MWUwZDIyNmNiMmNkZjA4ODE3IiwidGFnIjoiIn0=', true);
    //dd($resDecrypt);

    $pass = 'Password123';
    $hashPass = Hash::make('Password1234');
    dd(Hash::check($pass, $hashPass));
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['authenticate'])->group(function () {
    Route::get('/produk', [UserController::class, 'produk'])->name('getproduk')->middleware('role:user|superadmin');
    Route::get('/manajemenproduk', [UserController::class, 'manajemenproduk'])->name('manajemenproduk')->middleware('role:user|superadmin');
    Route::get('/tambahproduk', [UserController::class, 'tambahproduk'])->name('tambahproduk')->middleware('role:user|superadmin');
    Route::post('/tambah-produk', [UserController::class, 'newproduk'])->name('newprodukk')->middleware('role:user|superadmin');
    Route::delete('/delete-produk/{id}', [UserController::class, 'deleteproduk'])->name('delete_produk')->middleware('role:user|superadmin');
    Route::get('/edit-produk/{id}', [UserController::class, 'editproduk'])->name('editproduk')->middleware('role:user|superadmin');
    Route::post('/update-produk/{id}', [UserController::class, 'updateproduk'])->name('update_produk')->middleware('role:user|superadmin');
    
    Route::get('/manajemen-user', [UserController::class, 'manajemenuser'])->name('manajemenuser')->middleware('role:superadmin');
    Route::get('/tambah-user', [UserController::class, 'tambahuser'])->name('tambahuser')->middleware('role:superadmin');
    Route::post('/tambah-user', [UserController::class, 'Newuser'])->name('Newuser.user')->middleware('role:superadmin');
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete_user')->middleware('role:superadmin');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit_user')->middleware('role:superadmin');
    Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update_user')->middleware('role:superadmin');
});


