@extends('layouts.app')

@section('content')
@section('select_plan', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Plan</h6>
                        <a class="btn btn-primary" href="{{ route('plans.create') }}">Add new Plan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Plan</th>
                                    {{-- <th scope="col">Stripe Plan</th> --}}
                                    <th scope="col">Product</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Interval</th>
                                    <th scope="col">Interval Count</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($plans))
                               @foreach( $plans as $plan )
                                <tr>
                                    <td>{{ $plan->nickname }}</td>
                                    {{-- <td>{{ getPlanName($plan->plan_stripe_id) }}</td> --}}
                                    <td>{{getProductName( $plan->product) }}</td>
                                    <td>{{ $plan->amount }}</td>
                                    <td>{{ $plan->currency }}</td>
                                    <td>{{ $plan->interval }}</td>
                                    <td>{{ $plan->interval_count }}</td>
                                    <td>
                                        <a href="{{ route('plan.delete', $plan) }}" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $plans->links('pagination::bootstrap-5') }}
@endsection
