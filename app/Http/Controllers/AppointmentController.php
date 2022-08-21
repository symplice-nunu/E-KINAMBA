<?php
    
namespace App\Http\Controllers;
    
// use App\Models\Customer;
use Illuminate\Http\Request;
    
class AppointmentController extends Controller
{ 
    public function index()
    {
        // $customers = Customer::latest()->paginate(5);
        return view('appointment.index',compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}