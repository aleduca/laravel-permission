<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Role $role)
  {
    $permissions = Permission::all();

    $permissions = $permissions->filter(function ($permission) use ($role) {
      return !$role->hasPermissionTo($permission);
    });

    return view('role.permission.create', [
      'role' => $role,
      'permissions' => $permissions
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $role = Role::findById($request->role_id);
    $permission = Permission::findById($request->permission_id);

    $role->givePermissionTo($permission);

    return redirect()->route('admin.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role, Permission $permission)
  {
    $role->revokePermissionTo($permission);

    return redirect()->route('admin.index');
  }
}
