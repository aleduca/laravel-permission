@extends('layout')

@section('content')
<h2>Create new Role</h2>

<form action="{{route('role.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Role</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Role name">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Add Role</button>
</form>


@endsection
