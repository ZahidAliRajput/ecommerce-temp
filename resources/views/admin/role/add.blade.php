@extends('layouts.app')

@section('content')
@section('select_role', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Role</h6>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ old('name')}}" id="name" name="name" aria-describedby="name">
            </div>

            <div class="mb-3">
                <label for="guard_name" class="form-label">Guard Name</label>
                <input type="text" class="form-control" id="guard_name" value="{{ old('guard_name')}}" name="guard_name" aria-describedby="guard_name">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
