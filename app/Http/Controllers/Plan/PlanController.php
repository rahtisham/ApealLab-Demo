<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use App\Models\Plan\Plan;
use Illuminate\Http\Request;
use app\Models\User;
use Stripe;
use Session;
use Exception;

class PlanController extends Controller
{

    protected $stripe;

    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('id','desc')->get();
        return view('plan.index' , compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->Validate($request,[
        //     'name' => 'required|unique',
        //     'cost' => 'required',
        //     'description' => 'required',
        // ]);

        $data = $request->except('_token');    


        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] *100;

        // Stripe Product Creation
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);

        
        // Stripe Plan Creation
        $stripePlanCreation = $this->stripe->plans->create([

            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'month', // it can be day,week,month or year
            'product' => $stripeProduct->id, 

        ]);

        $data['stripe_plan'] = $stripeProduct->id;

        Plan::create($data);

        return response()->json(['message'=>'Plan Has Been Created']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $plan)
    {

        $plan = Plan::where('name' , '=' , $plan)->get();

        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
        
        return view('plan.show', compact('plan', 'intent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
}
