<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ModelRoleController extends Controller
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

    $roles = Role::where('name', '!=', 'super-admin')->get();

    $roles = $roles->filter(function ($role) use ($user) {
      return !$user->hasRole($role);
    });

    return view('model.role.create', [
      'user' => $user,
      'roles' => $roles
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = User::find($request->user_id);
    $role = Role::findById($request->role_id);

    $user->assignRole($role);

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
  public function destroy(User $user, Role $role)
  {
    $user->removeRole($role);

    return redirect()->route('admin.index');
  }
}
