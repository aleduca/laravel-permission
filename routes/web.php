<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModelPermissionController;
use App\Http\Controllers\ModelRoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  Auth::loginUsingId(1);
  return view('home');
});

Route::group(['middleware' => 'role:super-admin'], function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

  // Roles
  Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
  Route::post('/role', [RoleController::class, 'store'])->name('role.store');
  Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.delete');

  // Permissions
  Route::delete('/permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');
  Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
  Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');

  // RolePermissions
  Route::get('/role/permission/create/{role}', [RolePermissionController::class, 'create'])->name('role.permission.create');
  Route::post('/role/permission', [RolePermissionController::class, 'store'])->name('role.permission.store');
  Route::delete('/role/permission/{role}/{permission}', [RolePermissionController::class, 'destroy'])->name('role.permission.delete');

  // Users

  // Roles
  Route::get('/model/role/create/{user}', [ModelRoleController::class, 'create'])->name('model.role.create');
  Route::post('/model/role', [ModelRoleController::class, 'store'])->name('model.role.store');
  Route::delete('/model/role/delete/{user}/{role}', [ModelRoleController::class, 'destroy'])->name('model.role.delete');

  // Permissions
  Route::get('/model/permission/create/{user}', [ModelPermissionController::class, 'create'])->name('model.permission.create');
  Route::post('/model/permission', [ModelPermissionController::class, 'store'])->name('model.permission.store');
  Route::delete('/model/permission/delete/{user}/{permission}', [ModelPermissionController::class, 'destroy'])->name('model.permission.delete');
});
