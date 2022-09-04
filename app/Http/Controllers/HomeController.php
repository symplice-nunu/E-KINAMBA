<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Appointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::table('users')->count();
        $appointment = DB::table('appointment')->count();
        $payment = DB::table('payment')->sum('amount');
        $customers = DB::table('customers')->count();
        // $washed = DB::table('appointment')->count();
        $correctedComparisons = 1;
        $washeds = Appointment::where('status', '=', $correctedComparisons)->get();
$washed = $washeds->count(); $correctedComparisonss = 0;
$denys = Appointment::where('status', '=', $correctedComparisonss)->get();
$deny = $denys->count();
        return view('home',compact('user','appointment','payment','customers','washed','deny'));
    }
    public function carHome()
    {
        return view('homepage/carhome');
    }
}
