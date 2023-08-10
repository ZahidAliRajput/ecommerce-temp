@extends('layouts.app')

@section('content')
@section('select_postcat', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Post Categories</h6>
                        <a class="btn btn-primary" href="{{ route('postcats.create') }}">Add new</a>
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
                                @if(isset($postcats))
                               @foreach( $postcats as $postcat )
                                <tr>
                                    <td>{{ $postcat->title }}</td>
                                    <td>{{ $postcat->status }}</td>
                                    <td>
                                        <a href="{{ route('postcat.delete', $postcat) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('postcats.edit', $postcat->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                                @endforeach 
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection