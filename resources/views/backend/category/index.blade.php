@extends('layouts.backend.master')
<!-- title -->
@section('title','Category List')
<!-- css section -->
@section('css')
@endsection
<!-- content section -->
@section('content')
<h1>List Category</h1><br>
<a class="btn btn-primary" href="{{route('categories.create')}}">Add Category</a>
@endsection
@section('js')
<script>

</script>
@endsection