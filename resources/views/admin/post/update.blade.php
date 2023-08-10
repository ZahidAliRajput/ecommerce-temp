@extends('layouts.app')
@section('content')
@section('select_posttag', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update post Tag</h6>
        <form action="{{ route('posttags.update',$posttag->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $posttag->id }}">
            <div class="mb-3">
                <label for="title" class="form-label">Ttitle</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $posttag->title ?? '' }}" aria-describedby="title">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active" {{ $posttag->status == 'active' ? 'selected' : ''  }}>Active</option>
                    <option value="inactive" {{ $posttag->status == 'inactive' ? 'selected' : ''  }}>In-active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection