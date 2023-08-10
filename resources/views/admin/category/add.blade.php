@extends('layouts.app')

@section('content')
@section('select_category', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Category</h6>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="categoryname" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryname" name="name" aria-describedby="categoryname">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">In-active</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection

