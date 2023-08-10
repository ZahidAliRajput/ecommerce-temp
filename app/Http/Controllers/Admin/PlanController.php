<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index()
    {
        $products = stripeAllProducts();
        $plans = Plan::paginate(10);
        return view('admin.plan.manage', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = stripeAllProducts();
        $products = $data->data;
        $plans = Plan::all();
        return view('admin.plan.add', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'nickname' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'interval' => 'required',
            'interval_count' => 'required',
        ]);

        $status = $request->status;
        $active = false;
        if ($status == 'active') {
            $active = true;
        } else {
            $active = false;
        }

        setStripeKey();
        $plan = \Stripe\Plan::create([
            'product' => $request->product,
            'nickname' => $request->nickname, // Replace with your plan nickname
            'amount' => $request->amount, // Replace with the plan amount in cents
            'currency' => $request->currency, // Replace with the currency code
            'interval' => $request->interval, // Replace with the plan interval (month or year)
            'interval_count' => $request->interval_count, // Replace with the number of intervals
            'active' =>  $active, // Replace with the number of intervals
        ]);

        $planid = $plan->id;

        $plan = new Plan();
        $plan->nickname = $request->nickname;
        $plan->product = $request->product;
        $plan->plan_stripe_id = $planid;
        $slug = Str::slug($request->nickname);
        $count = Plan::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $plan->slug = $slug;

        $plan->status = $status;
        $plan->currency = $request->currency;
        $plan->amount = $request->amount;
        $plan->interval_count = $request->interval_count;
        $plan->interval = $request->interval;
        $plan->save();
        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = stripeAllProducts();
        $products = $data->data;
        $plan = Plan::where('id', $id)->first();
        return view('admin.plan.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product' => 'required',
            'nickname' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'interval' => 'required',
            'interval_count' => 'required',
        ]);

        $plan = Plan::where('id', $request->id)->first();

        $status = $request->status;
        $active = false;
        if ($status == 'active') {
            $active = true;
        } else {
            $active = false;
        }

        setStripeKey();
        $planId = $plan->plan_stripe_id;
        // Retrieve the plan from Stripe
        $strplan = \Stripe\Plan::retrieve($planId);
        // Update the plan properties

        $strplan->product = $request->product;
        $strplan->nickname = $request->nickname; // Replace with your plan nickname
        $strplan->amount = $request->amount; // Replace with the plan amount in cents
        $strplan->currency = $request->currency; // Replace with the currency code
        $strplan->interval = $request->interval; // Replace with the plan interval (month or year)
        $strplan->interval_count = $request->interval_count; // Replace with the number of intervals
        $strplan->active =  $active; // Replace with the number of intervals
        // Save the updated plan
        $strplan->save();

        $planid = $strplan->id;
        $plan = new Plan();
        $plan->nickname = $request->nickname;
        $plan->product = $request->product;
        $plan->plan_stripe_id = $planid;
        $slug = Str::slug($request->nickname);
        $count = Plan::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $plan->slug = $slug;

        $plan->status = $status;
        $plan->currency = $request->currency;
        $plan->amount = $request->amount;
        $plan->interval_count = $request->interval_count;
        $plan->interval = $request->interval;
        $plan->save();
        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Plan $plan, $id)
    {
        $plan->find($id)->delete();
        return back()->withError("Deleted sucessfully!");
    }
}
