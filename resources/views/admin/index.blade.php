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
    <a href="{{ route('permission.create') }}"><i class="bi bi-plus-square" style="color:green"></i> Create Permission</a>
    <ul class="list-group">
      @forelse($permissions as $permission)
      <li class="list-group-item">
        {{ $permission->name }}
        <form action="{{route('permission.delete',$permission->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="bi bi-dash-square" style="color:white;"></i>
            Remove
          </button>
        </form>
      </li>
      @empty
      <li class="list-group-item">No permissions created, yet.</li>
      @endforelse
    </ul>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-12">
    <h5>Users</h5>
    <ul class="list-group">
      @forelse($users as $user)
      @if(!$user->hasRole('super-admin'))
      <b>{{ $user->name }}</b>
      <li class="list-group-item d-flex justify-content-between mb-3">
        <div>
          <ul class="list-group">
            <h6>
              Roles
              <small>
                <a href="{{ route('model.role.create',$user->id) }}"><i class="bi bi-plus-square" style="color:green"></i> Add Role</a>
              </small>
            </h6>
            @forelse($user->roles as $role)
            <li class="list-group-item d-flex justify-content-between w-100">
              <span>{{ $role->name }}</span>
              <form action="{{route('model.role.delete',[$user->id,$role->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm">Revoke</button>
              </form>
            </li>
            @empty
            <li class="list-group-item">No role added to this user, yet.</li>
            @endforelse
          </ul>
        </div>
        <div>
          <ul class="list-group">
            <h6>Permissions <small><a href="{{route('model.permission.create',$user->id)}}"><i class="bi bi-plus-square" style="color:green"></i> Add Permission</a></small></h6>
            @forelse($user->permissions as $permission)
            <li class="list-group-item">
              <span>{{$permission->name}}</span>
              <form action="{{route('model.permission.delete',[$user->id,$permission->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm">Revoke</button>
              </form>
            </li>
            @empty
            <li class="list-group-item">
              No permission to this user
            </li>
            @endforelse
          </ul>
        </div>
      </li>
      @endif
      @empty
      <li class="list-group-item">No users created, yet.</li>
      @endforelse
    </ul>
  </div>
</div>
@endsection
