@extends('layout')

@section('content')
<h2>Add permission to role {{ $role->name }}</h2>

@if($permissions->isEmpty())
<div class="alert alert-warning">
  <p>No permissions created, yet</p>
</div>
@else
<form action="{{ route('role.permission.store') }}" method="post">
  @csrf
  <input type="hidden" name="role_id" value="{{ $role->id }}">
  <div class="form-group">
    <label for="permission">Permission</label>
    <select name="permission_id" id="permission" class="form-control">
      @foreach($permissions as $permission)
      <option value="{{ $permission->id }}">{{ $permission->name }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Add Permission</button>
</form>
@endif

@endsection
