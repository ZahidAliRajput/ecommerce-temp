@extends('layouts.app')

@section('content')
@section('select_banner', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Banner</h6>
        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
            </div>

            <div class="form-floating">
                <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px;"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">In-active</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Image</label>
                <input class="form-control bg-dark" type="file" name="image" id="formFileMultiple">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
