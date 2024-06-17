@extends('layout')

@section('content')
<h2>Add role to user {{ $user->name }}</h2>

@if($roles->isEmpty())

<div class="alert alert-warning">
  <p>No roles available to this user, or no roles created</p>
</div>
@else
<form action="{{ route('model.role.store') }}" method="post">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id }}">
  <div class="form-group">
    <label for="permission">Role</label>
    <select name="role_id" id="role" class="form-control">
      @foreach($roles as $role)
      <option value="{{ $role->id }}">{{ $role->name }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Add Role</button>
</form>
@endif

@endsection
