@extends('layouts.app')
@section('content')
@section('select_coupon', 'active')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Coupon</h6>
            <a class="btn btn-danger" href="{{ route('coupons.create') }}">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Coupon Code</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cops as $cop)
                        <tr>
                            <td>{{ $cop->coupon_code }}</td>
                            <td>{{ $cop->discount_price }}</td>
                            <td>{{ $cop->status }}</td>
                            <td>
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('coupons.edit', $cop->id) }}">Edit</a></li>

                                        <li><a class="dropdown-item"
                                                href="{{ route('coupon.delete', $cop->id) }}">Delete</a></li>
                                                @if ($cop->status == 'active')
                                                <li><a class="dropdown-item"
                                                    href="{{ route('coupon.status', $cop->id) }}">De activate</a></li>
                                                    @else
                                                    <li><a class="dropdown-item"
                                                        href="{{ route('coupon.status', $cop->id) }}">Activate</a></li>
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
{{ $cops->links('pagination::bootstrap-5') }}
@endsection
