@extends('layouts.app')

@section('content')
@section('select_product', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Product</h6>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productname" name="name" aria-describedby="productname">
            </div>

            <div class="form-floating">
                <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea" style="height: 150px;"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="price">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select mb-3" aria-label="Default select example" name="category">
                    @foreach($cats as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="coupon" class="form-label">Coupon</label>
                <select class="form-select mb-3" aria-label="Default select example" name="coupon">
                   <option value="">Select Coupon</option>
                    @foreach($coupons as $coupon)
                    <option value="{{ $coupon->id }}">{{ $coupon->coupon_code }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select mb-3" aria-label="Default select example" name="brand">
                   <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Image</label>
                <input class="form-control bg-dark" type="file" name="image" id="formFileMultiple">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
