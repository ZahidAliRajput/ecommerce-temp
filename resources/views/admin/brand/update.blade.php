@extends('layouts.app')
@section('content')
@section('select_brand', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update Brand</h6>
        <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $brand->id }}">
            <div class="mb-3">
                <label for="title" class="form-label">Ttitle</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $brand->title ?? '' }}" aria-describedby="title">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active" {{ $brand->status == 'active' ? 'selected' : ''  }}>Active</option>
                    <option value="inactive" {{ $brand->status == 'inactive' ? 'selected' : ''  }}>In-active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection