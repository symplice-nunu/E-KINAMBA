<?php

    

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Payment;
use Session;

use Stripe;

     

class StripePaymentController extends Controller

{

    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('payment.index',compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {
        $services = Service::latest()->paginate(5);
        return view('payment/customerPayments',compact('services'));

    }

    

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $request->amount * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Customer Payment" 

        ]);
        request()->validate([
            'amount' => 'required', 
            'service' => 'required', 
        ]);
        $names = $request->input('names');
    $amount = $request->input('amount');
    $service = $request->input('service');
    date_default_timezone_set("Africa/Kigali");
    $current_date_time = date('d-m-Y H:i:s');

    $data = array("names" => $names,
                  "amount" => $amount,
                  "service" => $service,
                  "paymentDate" => $current_date_time);
                //   "updated_at" => $current_date_time);
    // DB::table('student')->insert($data);
        
        Payment::create($data);
      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }

}