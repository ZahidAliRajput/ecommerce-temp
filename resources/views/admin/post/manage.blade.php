@extends('layouts.app')

@section('content')
@section('select_posttag', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Post Tags</h6>
                        <a class="btn btn-primary" href="{{ route('posts.create') }}">Add new</a>
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
                                @if(isset($posttags))
                               @foreach( $posttags as $posttag )
                                <tr>
                                    <td>{{ $posttag->title }}</td>
                                    <td>{{ $posttag->status }}</td>
                                    <td>
                                        <a href="{{ route('posttag.delete', $posttag) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('posttags.edit', $posttag->id) }}" class="btn btn-success">Edit</a>
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