@extends('layouts.app')

@section('content')
@section('select_shipping', 'active')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Shipping</h6>
            <a class="btn btn-primary" href="{{ route('shippings.create') }}">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($shippings))
                        @foreach ($shippings as $shipping)
                            <tr>
                                <td>{{ $shipping->type }}</td>
                                <td>{{ $shipping->price }}</td>
                                <td>
                                    @if ($shipping->status == 'active')
                                        <span class="badge badge-success">{{ $shipping->status }}</span>
                                </td>
                            @else
                                <span class="badge badge-danger">{{ $shipping->status }}</span></td>
                        @endif
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('shippings.edit', $shipping->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('shipping.delete', $shipping) }}">Delete</a></li>
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

@endsection
