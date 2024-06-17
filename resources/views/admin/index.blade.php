@extends('layout')

@section('content')
<h2>Admin</h2>

<div class="row">
  <div class="col-9">
    <h5>Roles</h5>
    <a href="{{ route('role.create') }}"><i class="bi bi-plus-square" style="color:green"></i> Create Role</a>
    <ul class="list-group">
      @forelse($roles as $role)
      <li class="list-group-item">
        <div class="d-flex align-items-center">

          {{ucfirst($role->name)}}

          <form action="{{route('role.delete',$role->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link" style="font-size: 13px !important;">
              <i class="bi bi-dash-square" style="color:red"></i> Delete Route</button>
          </form>


          <a href="{{route('role.permission.create',$role->id)}}" style=" font-size: 13px !important;"> <i class="bi bi-plus-square" style="color:green;"></i> Add permission</a>

        </div>
        <ul class="list-group">
          @forelse($role->permissions as $permission)
          <li class="list-group-item d-flex justify-content-between">
            <span>{{$permission->name}}</span>
            <form action="{{route('role.permission.delete',[$role->id,$permission->id])}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-warning btn-sm">Revoke</button>
            </form>
          </li>
          @empty
          <li class="list-group-item">No permissions to this role.</li>
          @endforelse
        </ul>

      </li>
      @empty
      <li class="list-group-item">No roles created, yet.</li>
      @endforelse
    </ul>
  </div>
  <div class="col-3">
    <h5>Permissions</h5>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-12">
    <h5>Users</h5>
  </div>
</div>
@endsection
