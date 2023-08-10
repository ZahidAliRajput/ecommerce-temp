@extends('layouts.app')

@section('content')
@section('select_brand', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Brand</h6>
                        <a class="btn btn-primary" href="{{ route('brands.create') }}">Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($brands))
                               @foreach( $brands as $brand )
                                <tr>
                                    <td>{{ $brand->title }}</td>
                                    <td>{{ $brand->status }}</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('brands.edit', $brand->id) }}">Edit</a></li>

                                                <li><a class="dropdown-item"
                                                        href="{{ route('brand.delete', $brand) }}">Delete</a></li>


                                                        @if ($brand->status == 'active')
                                                        <li><a class="dropdown-item"
                                                            href="{{ route('brand.status', $brand->id) }}">De activate</a></li>
                                                            @else
                                                            <li><a class="dropdown-item"
                                                                href="{{ route('brand.status', $brand->id) }}">Activate</a></li>
                                                        @endif

                                                    </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $brands->links('pagination::bootstrap-5') }}
@endsection
