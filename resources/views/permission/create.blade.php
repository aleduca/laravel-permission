@extends('layout')

@section('content')
<h2>New Permissions</h2>

<form action="{{ route('permission.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Permission</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Permission name">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Add Permission</button>
</form>

@endsection
