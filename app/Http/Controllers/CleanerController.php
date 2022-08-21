<?php
    
namespace App\Http\Controllers;
    
use App\Models\Cleaner;
use Illuminate\Http\Request;
    
class CleanerController extends Controller
{ 
    public function index()
    {
        $cleaners = Cleaner::latest()->paginate(5);
        return view('cleaner.index',compact('cleaners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('cleaner.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'Name' => 'required', 
            'Phone' => 'required', 
            'Address' => 'required'
        ]);
    
        Cleaner::create($request->all());
    
        return redirect()->route('cleaner.index')
                        ->with('success','Cleaner created successfully.');
    }

    public function edit(Cleaner $cleaner)
    {
        return view('cleaner.edit',compact('cleaner'));
    }
    public function update(Request $request, Cleaner $cleaner)
    {
         request()->validate([
            'Name' => 'required', 
            'Phone' => 'required', 
            'Address' => 'required'
        ]);
    
        $cleaner->update($request->all());
    
        return redirect()->route('cleaner.index')
                        ->with('success','Cleaner updated successfully');
    }
    public function destroy(Cleaner $cleaner)
    {
        $cleaner->delete();
    
        return redirect()->route('cleaner.index')
                        ->with('success','Cleaner deleted successfully');
    }
}