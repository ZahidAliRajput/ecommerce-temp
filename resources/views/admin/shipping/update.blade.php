@extends('layouts.app')
@section('content')
@section('select_shipping', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update shipping</h6>
        <form action="{{ route('shippings.update',$shipping->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $shipping->id }}">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ old('type') ?? $shipping->type ?? '' }}" aria-describedby="type">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') ?? $shipping->price ?? '' }}" aria-describedby="price">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active" {{ $shipping->status == 'active' ? 'selected' : ''  }}>Active</option>
                    <option value="inactive" {{ $shipping->status == 'inactive' ? 'selected' : ''  }}>In-active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection