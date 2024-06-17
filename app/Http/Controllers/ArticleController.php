<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
  public static function middleware(): array
  {
    return [
      // 'permission:edit articles',
      // 'role:writer,web'
      // new Middleware([
      //   'role:writer,web',
      //   'permission:edit articles,web'
      // ], only: ['index']),
      // new Middleware(
      //   [
      //     RoleMiddleware::using('writer', 'web'),
      //     PermissionMiddleware::using('edit articles', 'web')
      //   ],
      //   only: ['index']
      // ),
      new Middleware(
        RoleOrPermissionMiddleware::using('writer|delete articles', 'web'),
        only: ['index']
      ),
    ];
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('articles.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
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
  public function destroy(string $id)
  {
    //
  }
}
