@extends('layouts.app')
@section('content')
@section('select_plan', 'active')
<div class="offset-md-3 col-sm-6 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Update Plan</h6>
        <form action="{{ route('plans.update',$plan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $plan->id }}">

            <div class="mb-3">
                <label for="nickname" class="form-label">Nick name</label>
                <input type="text" value="{{ $plan->nickname }}" class="form-control" id="nickname" name="nickname" aria-describedby="nickname">
            </div>


            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select mb-3" aria-label="Default select example" name="status">
                    <option value="active" @if($plan->status == 'active') selected @endif>Active</option>
                    <option value="inactive" @if($plan->status == 'inactive') selected @endif>In-active</option>
                </select>
            </div>
                <div class="mb-3">
                    <label for="product" class="form-label">Product</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="product">
                        @foreach ($products as $product)
                        <?php
                        if($product->id == $plan->product){
                            $selected = 'selected';
                        }
                        ?>
                        <option $selected value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" value="{{ $plan->amount }}" class="form-control" id="amount" name="amount" aria-describedby="amount">
            </div>

            <div class="mb-3">
                <label for="currency" class="form-label">Currency</label>

                <select class="form-select mb-3" aria-label="Default select example" name="currency">
                    @foreach (stripeCurrencies() as $currency)
                    <?php
                    if($currency == $plan->currency){
                        $selected = 'selected';
                    }
                    ?>
                    <option $selected value="{{ $currency }}">{{ ucwords($currency) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="interval" class="form-label">interval</label>
                <select class="form-select mb-3" aria-label="Default select example" name="interval">
                    <option value="day" @if($plan->interval == 'day') selected @endif>Day</option>
                    <option value="week" @if($plan->interval == 'week') selected @endif>Week</option>
                    <option value="month" @if($plan->interval == 'month') selected @endif>Month</option>
                    <option value="year" @if($plan->interval == 'year') selected @endif>Year</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="interval_count" class="form-label">Interval Count</label>
                <input type="number" value="{{ $plan->interval_count }}" class="form-control" id="interval_count" name="interval_count" aria-describedby="interval_count">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
