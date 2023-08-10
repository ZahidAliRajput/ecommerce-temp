@extends('layouts.app')

@section('content')
@section('select_category', 'active')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Categories</h6>
            <a class="btn btn-danger" href="{{ route('categories.create') }}">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->status }}</td>
                            <td>


                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('categories.edit', $cat->id) }}">Edit</a></li>

                                        <li><a class="dropdown-item"
                                                href="{{ route('category.delete', $cat->id) }}">Delete</a></li>
                                            @if ($cat->status == 'active')
                                            <li><a class="dropdown-item"
                                                href="{{ route('category.status', $cat->id) }}">De activate</a></li>
                                                @else
                                                <li><a class="dropdown-item"
                                                    href="{{ route('category.status', $cat->id) }}">Activate</a></li>
                                            @endif


                                            </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $cats->links('pagination::bootstrap-5') }}
@endsection
