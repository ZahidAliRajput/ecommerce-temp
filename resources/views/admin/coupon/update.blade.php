@extends('layouts.app')

@section('content')
@section('select_coupon', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update Coupon</h6>
        <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $coupon->id }}" name="id">

            <div class="mb-3">
                <label for="coupon_code" class="form-label">Coupon Code</label>
                <input type="text" class="form-control" value="{{ $coupon->coupon_code }}" id="coupon_code" name="coupon_code" aria-describedby="coupon_code">
            </div>

            <div class="mb-3">
                <label for="discount_price" class="form-label">Discoun Price</label>
                <input type="number" class="form-control" value="{{ $coupon->discount_price }}" id="discount_price" name="discount_price" aria-describedby="discount_price">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">In-active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
