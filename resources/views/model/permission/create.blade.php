@extends('layout')

@section('content')
<h2>Add Permission to user {{ $user->name }}</h2>

@if($permissions->isEmpty())

<div class="alert alert-warning">
  <p>No Permissions available to this user, or no Permissions created</p>
</div>
@else
<form action="{{ route('model.permission.store') }}" method="post">
  @csrf
  <input type="hidden" name="user_id" value="{{ $user->id }}">
  <div class="form-group">
    <label for="permission">Permission</label>
    <select name="permission_id" id="Permission" class="form-control">
      @foreach($permissions as $permission)
      <option value="{{ $permission->id }}">{{ $permission->name }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Add Permission</button>
</form>
@endif

@endsection
