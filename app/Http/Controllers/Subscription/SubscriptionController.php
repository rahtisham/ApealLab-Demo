<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan\Plan;
use Illuminate\Http\Request;
use app\Models\User;
use Stripe;
use Session;
use Exception;

class SubscriptionController extends Controller
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
        return view('subscription.index' , compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $plan = Plan::findOrFail($request->get('plan'));

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;


        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('default', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);
        
        return back()->with('success' , 'Your plan subscribed successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionModel  $subscriptionModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $plan)
    {   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionModel  $subscriptionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionModel $subscriptionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriptionModel  $subscriptionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionModel $subscriptionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionModel  $subscriptionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionModel $subscriptionModel)
    {
        //
    }
}
