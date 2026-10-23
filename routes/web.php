<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Halaman Role. Hak aksesnya bisa diatur dari checkbox di menu Role.
Route::middleware(['auth', 'permission:menu-role', 'permission:lihat-data'])->get('/role', [RoleController::class, 'index'])->name('role.index');
Route::middleware(['auth', 'permission:menu-role', 'permission:tambah-data'])->get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::middleware(['auth', 'permission:menu-role', 'permission:tambah-data'])->post('/role', [RoleController::class, 'store'])->name('role.store');
Route::middleware(['auth', 'permission:menu-role', 'permission:ubah-data'])->get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::middleware(['auth', 'permission:menu-role', 'permission:ubah-data'])->put('/role/{role}', [RoleController::class, 'update'])->name('role.update');
Route::middleware(['auth', 'permission:menu-role', 'permission:hapus-data'])->delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

// Halaman Pengguna.
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:lihat-data'])->get('/user', [UserController::class, 'index'])->name('user.index');
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:tambah-data'])->get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:tambah-data'])->post('/user', [UserController::class, 'store'])->name('user.store');
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:ubah-data'])->get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:ubah-data'])->put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::middleware(['auth', 'permission:menu-pengguna', 'permission:hapus-data'])->delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// Mahasiswa
Route::middleware(['auth', 'permission:menu-mahasiswa', 'permission:tambah-data'])->resource('mahasiswa', MahasiswaController::class)->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-mahasiswa', 'permission:lihat-data'])->resource('mahasiswa', MahasiswaController::class)->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-mahasiswa', 'permission:ubah-data'])->resource('mahasiswa', MahasiswaController::class)->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-mahasiswa', 'permission:hapus-data'])->resource('mahasiswa', MahasiswaController::class)->only(['destroy']);

// Dosen
Route::middleware(['auth', 'permission:menu-dosen', 'permission:tambah-data'])->resource('dosen', DosenController::class)->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-dosen', 'permission:lihat-data'])->resource('dosen', DosenController::class)->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-dosen', 'permission:ubah-data'])->resource('dosen', DosenController::class)->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-dosen', 'permission:hapus-data'])->resource('dosen', DosenController::class)->only(['destroy']);

// Mata Kuliah
Route::middleware(['auth', 'permission:menu-mata-kuliah', 'permission:tambah-data'])->resource('mata-kuliah', MataKuliahController::class)->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-mata-kuliah', 'permission:lihat-data'])->resource('mata-kuliah', MataKuliahController::class)->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-mata-kuliah', 'permission:ubah-data'])->resource('mata-kuliah', MataKuliahController::class)->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-mata-kuliah', 'permission:hapus-data'])->resource('mata-kuliah', MataKuliahController::class)->only(['destroy']);

// Ruangan
Route::middleware(['auth', 'permission:menu-ruangan', 'permission:tambah-data'])->resource('ruangan', RuanganController::class)->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-ruangan', 'permission:lihat-data'])->resource('ruangan', RuanganController::class)->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-ruangan', 'permission:ubah-data'])->resource('ruangan', RuanganController::class)->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-ruangan', 'permission:hapus-data'])->resource('ruangan', RuanganController::class)->only(['destroy']);

// Kelas
Route::middleware(['auth', 'permission:menu-kelas', 'permission:tambah-data'])->resource('kelas', KelasController::class)->parameters(['kelas' => 'kls'])->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-kelas', 'permission:lihat-data'])->resource('kelas', KelasController::class)->parameters(['kelas' => 'kls'])->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-kelas', 'permission:ubah-data'])->resource('kelas', KelasController::class)->parameters(['kelas' => 'kls'])->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-kelas', 'permission:hapus-data'])->resource('kelas', KelasController::class)->parameters(['kelas' => 'kls'])->only(['destroy']);

// Jadwal Kuliah
Route::middleware(['auth', 'permission:menu-jadwal-kuliah', 'permission:tambah-data'])->resource('jadwal-kuliah', JadwalKuliahController::class)->only(['create', 'store']);
Route::middleware(['auth', 'permission:menu-jadwal-kuliah', 'permission:lihat-data'])->resource('jadwal-kuliah', JadwalKuliahController::class)->only(['index', 'show']);
Route::middleware(['auth', 'permission:menu-jadwal-kuliah', 'permission:ubah-data'])->resource('jadwal-kuliah', JadwalKuliahController::class)->only(['edit', 'update']);
Route::middleware(['auth', 'permission:menu-jadwal-kuliah', 'permission:hapus-data'])->resource('jadwal-kuliah', JadwalKuliahController::class)->only(['destroy']);
