@extends('layouts.app')

@section('content')
@section('select_banner', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Banner</h6>
                        <a class="btn btn-primary" href="{{ route('banners.create') }}">Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($banners))
                               @foreach( $banners as $banner )
                                <tr>
                                    <td>
                                        <img src="{{ asset('bannerimages/'.$banner->image) }}" width="70" height="70" alt="banner-image">
                                    </td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->description }}</td>
                                    <td>{{ $banner->status }}</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('banners.edit', $banner->id) }}">Edit</a></li>

                                                <li><a class="dropdown-item"
                                                        href="{{ route('banner.delete', $banner) }}">Delete</a></li>

                                                        @if ($banner->status == 'active')
                                                        <li><a class="dropdown-item"
                                                            href="{{ route('banner.status', $banner->id) }}">De activate</a></li>
                                                            @else
                                                            <li><a class="dropdown-item"
                                                                href="{{ route('banner.status', $banner->id) }}">Activate</a></li>
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
            {{ $banners->links('pagination::bootstrap-5') }}
@endsection
