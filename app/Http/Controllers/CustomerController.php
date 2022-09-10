<?php
    
namespace App\Http\Controllers;
    
use App\Models\Customer;
use Illuminate\Http\Request;
    
class CustomerController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        return view('customers.index',compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'CustomerName' => 'required', 
            'CustomerAddress' => 'required', 
            'CustomerPhoneNumber' => 'required', 
            'PlateNumber' => 'required',
            'email' => 'required',
        ]);
    
        Customer::create($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Customer created successfully.');
    }
    
   
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }
   
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
         request()->validate([
            'CustomerName' => 'required', 
            'CustomerAddress' => 'required', 
            'CustomerPhoneNumber' => 'required', 
            'PlateNumber' => 'required',
            'email' => 'required',
        ]);
    
        $customer->update($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Customer updated successfully');
    }
    public function destroy(Customer $customer)
    {
        $customer->delete();
    
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}