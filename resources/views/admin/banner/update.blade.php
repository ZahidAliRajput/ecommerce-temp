@extends('layouts.app')
@section('content')
@section('select_banner', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update Banner</h6>
        <form action="{{ route('banners.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $banner->id }}">
            <div class="mb-3">
                <label for="title" class="form-label">Ttitle</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $banner->title ?? '' }}" aria-describedby="title">
            </div>

            <div class="form-floating">
                <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px;">{{ old('description') ?? $banner->description ?? ''}}</textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active" {{ $banner->status == 'active' ? 'selected' : ''  }}>Active</option>
                    <option value="inactive" {{ $banner->status == 'inactive' ? 'selected' : ''  }}>In-active</option>
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