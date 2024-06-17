<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ModelPermissionController extends Controller
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
  public function create(User $user)
  {
    $permissions = Permission::all();

    $permissions = $permissions->filter(function ($permission) use ($user) {
      return !$user->hasPermissionTo($permission);
    });

    return view('model.permission.create', [
      'user' => $user,
      'permissions' => $permissions
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = User::find($request->user_id);
    $permission = Permission::findById($request->permission_id);

    $user->givePermissionTo($permission);

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
  public function destroy(User $user, Permission $permission)
  {
    $user->revokePermissionTo($permission);

    return redirect()->route('admin.index');
  }
}
