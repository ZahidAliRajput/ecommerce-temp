@extends('layouts.app')

@section('content')
@section('select_plan', 'active')
<div class="offset-md-2 col-md-8">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add Plan</h6>
        <form action="{{ route('plans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nickname" class="form-label">Nick name</label>
                <input type="text" class="form-control" id="nickname" name="nickname" aria-describedby="nickname">
            </div>


            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">In-active</option>
                </select>
            </div>
                <div class="mb-3">
                    <label for="product" class="form-label">Product</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="product">
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" aria-describedby="amount">
            </div>

            <div class="mb-3">
                <label for="currency" class="form-label">Currency</label>

                <select class="form-select mb-3" aria-label="Default select example" name="currency">
                    @foreach (stripeCurrencies() as $currency)
                    <option value="{{ $currency }}">{{ ucwords($currency) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="interval" class="form-label">interval</label>
                <select class="form-select mb-3" aria-label="Default select example" name="interval">
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="interval_count" class="form-label">Interval Count</label>
                <input type="number" class="form-control" id="interval_count" name="interval_count" aria-describedby="interval_count">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
