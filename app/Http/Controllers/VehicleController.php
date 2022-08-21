<?php
    
namespace App\Http\Controllers;
    
// use App\Models\Customer;
use Illuminate\Http\Request;
    
class VehicleController extends Controller
{ 
    public function index()
    {
        // $customers = Customer::latest()->paginate(5);
        return view('vehicles.index',compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}