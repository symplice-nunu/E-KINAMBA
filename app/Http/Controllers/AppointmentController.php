<?php
    
namespace App\Http\Controllers;
    
use App\Models\Appointment;
use Illuminate\Http\Request;
    
class AppointmentController extends Controller
{ 

    // function __construct()
    // {
    //      $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:customer-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $appointments = Appointment::latest()->paginate(5);
        // return view('appointment.index');
        return view('appointments.index',compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('appointments.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'names' => 'required', 
            'phone' => 'required', 
            'plateNumber' => 'required', 
            'carModel' => 'required',
            'Service' => 'required', 
            // 'AdditionalService' => 'required',
            'carwashdate' => 'required', 
            'email' => 'required',
        ]);
        Appointment::create($request->all());
    
        return redirect()->route('appointments.create')
                        ->with('success','Appointment Made successfully.');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.approve',compact('appointment'));
    }
    

    public function show(Appointment $appointment)
    {
        return view('appointments.ban',compact('appointment'));
    }
    public function update(Request $request, Appointment $appointment)
    {
        
        $appointment->update($request->all());
    
        return redirect()->route('appointments.index')
                        ->with('success','Your Choice Made Successfully.');
    }
  
    
    
}