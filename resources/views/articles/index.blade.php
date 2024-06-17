@extends('layout')

@section('content')
<h2>Articles</h2>

@can('edit articles')
<p>✅You are a writer</p>
@else
<p>❌You are not a writer</p>
@endcan

@endsection
