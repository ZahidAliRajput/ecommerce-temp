@extends('layouts.app')

@section('content')
@section('select_product', 'active')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Product</h6>
            <a class="btn btn-primary" href="{{ route('products.create') }}">Add new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Coupon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                        @foreach ($products as $pro)
                            <tr>
                                <td>
                                    <img src="{{ asset('productimages/' . $pro->image) }}" width="70" height="70"
                                        alt="product-image">
                                </td>
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->description }}</td>
                                <td>{{ $pro->price }}</td>

                                @foreach ($brands as $brand)
                                @if ($brand->id == $pro->brand_id)
                                    <td>{{ $brand->title }}</td>
                                @endif
                            @endforeach

                                @foreach ($cats as $cat)
                                    @if ($cat->id == $pro->category_id)
                                        <td>{{ $cat->name }}</td>
                                    @endif
                                @endforeach

                                @if (!is_null($pro->coupon_id))
                                    @foreach ($coupons as $coupon)
                                        @if ($coupon->id == $pro->coupon_id)
                                            <td>{{ $coupon->coupon_code }}</td>
                                        @endif
                                    @endforeach
                                @else
                                    <td>
                                        <p>Not Applied</p>
                                    </td>
                                @endif

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('products.edit', $pro->id) }}">Edit</a></li>

                                            <li><a class="dropdown-item"
                                                    href="{{ route('product.delete', $pro->id) }}">Delete</a></li>
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
{{ $products->links('pagination::bootstrap-5') }}
@endsection
