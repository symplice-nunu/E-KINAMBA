<?php
    
namespace App\Http\Controllers;
    
use App\Models\Service;
use Illuminate\Http\Request;
    
class ServiceController extends Controller
{ 

    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','show']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $services = Service::latest()->paginate(5);
        return view('service.index',compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'ServiceName' => 'required', 
            'ServiceType' => 'required', 
            'ServicePrice' => 'required'
        ]);
    
        Service::create($request->all());
    
        return redirect()->route('service.index')
                        ->with('success','Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }
    public function update(Request $request, Service $service)
    {
         request()->validate([
            'ServiceName' => 'required', 
            'ServiceType' => 'required',
        ]);
    
        $service->update($request->all());
    
        return redirect()->route('service.index')
                        ->with('success','Service updated successfully');
    }
    public function destroy(Service $service)
    {
        $service->delete();
    
        return redirect()->route('service.index')
                        ->with('success','Service deleted successfully');
    }
    
}