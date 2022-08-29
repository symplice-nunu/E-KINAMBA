<?php
    
namespace App\Http\Controllers;
    
use App\Models\Appointment;
use App\Models\Cleaner;
use Illuminate\Http\Request;
use Mail;
use DB;
 
use App\Mail\NotifyMail;
    
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

    public function ApprovedApp()
    {
        $appointments = Appointment::latest()->paginate(5);
        // return view('appointment.index');
        return view('appointments.approvelist',compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DenyApp()
    {
        $appointments = Appointment::latest()->paginate(5);
        // return view('appointment.index');
        return view('appointments.denylist',compact('appointments'))
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
        $cleaners = Cleaner::latest()->paginate(5);
        return view('appointments.approve',compact('appointment','cleaners'));
    }
    

    public function show(Appointment $appointment)
    {
        return view('appointments.ban',compact('appointment'));
    }
    public function update(Request $request, Appointment $appointment)
    {
        $userdata = DB::table('appointment')->where('id','=',$request->get('app_id'))->first();

        $data =array(
            'emailto'=>$userdata->email,
            'names'=>$userdata->names,
            'Service'=>$userdata->Service,
        );
        $email_to = $userdata->email;
        $to_name = $userdata->names;
        
        $appointment->update($request->all());
        // Mail::to($request->get('confirmEmail'), 'E-KINAMBA')->send(new NotifyMail());

        Mail::send('emails.appointmentsMail', $data, function($message) use ($to_name, $email_to) {
            $message->to($email_to, $to_name)
            ->subject('E-KINAMBA');
            $message->from('intwarisymplice@gmail.com','E-KINAMBA');
            });
    
        return redirect()->route('appointments.index')
                        ->with('success','Your Choice Made Successfully.');
    }
  
    
    
}