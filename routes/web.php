<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Anugrah\ClusterController;

use App\Http\Controllers\Anugrah\UserController;
use App\Http\Controllers\Anugrah\RoleController;

use App\Http\Controllers\Anugrah\BarangController;
use App\Http\Controllers\Anugrah\PenjualanController;
use App\Http\Controllers\Anugrah\AuthController;

use Illuminate\Support\Facades\Route;

// Route::get('/medical-records', [MedicalRecordController::class, '']);
// Route::get('/clustering', [ClusteringController::class, 'index'])->name('cluster.clustering');
// Route::post('/clustering', [ClusteringController::class, 'kMeansClustering'])->name('kmeans.clustering');

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/setting', [AuthController::class, 'setting']);
Route::post('/edituser', [AuthController::class, 'edituser']);

Route::get('/clustering', 'ClusteringController@index')->name('cluster.clustering');
Route::post('/clustering', 'ClusteringController@clusterByDate');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('barang', [BarangController::class, 'index'])->name('barang.list');
Route::get('barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::get('barang/add', [BarangController::class, 'create'])->name('barang.create');
Route::post('barang/store', [BarangController::class, 'store'])->name('barang.add');
Route::get('barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.list');
Route::get('penjualan/show/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
Route::get('penjualan/add', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.add');
Route::get('penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::get('penjualan/delete/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

Route::get('data_cluster', [ClusterController::class, 'index'])->name('data_cluster.list');

Route::get('user', [UserController::class, 'index'])->name('user.list');
Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('user/add', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.add');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('role', [RoleController::class, 'index'])->name('role.list');
Route::get('role/show/{id}', [RoleController::class, 'show'])->name('role.show');
Route::get('role/add', [RoleController::class, 'create'])->name('role.create');
Route::post('role/store', [RoleController::class, 'store'])->name('role.add');
Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::get('role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
