@extends('layouts.backend.master')
<!-- title -->
@section('title','Create Categoyr')
<!-- css section -->
@section('css')
@endsection
<!-- content section -->
@section('content')
<x-auth-validation-errors class="mb-4" :errors="$errors" />
<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
    </div>

    <div class="form-group">
        <label for="description">Category Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter category description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
@endsection
@section('js')
<script>

</script>
@endsection