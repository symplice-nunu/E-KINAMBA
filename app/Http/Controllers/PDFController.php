<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;

use App\Models\Customer;
use App\Models\Cleaner;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Payment;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $customers = Customer::latest()->paginate(5);
          
        $pdf = PDF::loadView('customers/indexPDF',compact('customers'));
    
        return $pdf->download('Customers.pdf');
    }
    public function generateCleanerPDF()
    {
        $cleaners = Cleaner::latest()->paginate(5);
          
        $pdf = PDF::loadView('cleaner/indexPDF',compact('cleaners'));
    
        return $pdf->download('Cleaner.pdf');
    }
    public function generateServicePDF()
    {
        $services = Service::latest()->paginate(5);
          
        $pdf = PDF::loadView('service/indexPDF',compact('services'));
    
        return $pdf->download('Service.pdf');
    }
    public function generateAppointmentPDF()
    {
        $appointments = Appointment::latest()->paginate(5);
          
        $pdf = PDF::loadView('appointments/indexPDF',compact('appointments'));
    
        return $pdf->download('appointments.pdf');
    }
    public function approvelistPDF()
    {
        $appointments = Appointment::latest()->paginate(5);
          
        $pdf = PDF::loadView('appointments/approvelistPDF',compact('appointments'));
    
        return $pdf->download('Approved_Appointments.pdf');
    }
    public function denylistPDF()
    {
        $appointments = Appointment::latest()->paginate(5);
          
        $pdf = PDF::loadView('appointments/denylistPDF',compact('appointments'));
    
        return $pdf->download('Deny_Appointments.pdf');
    }
    public function paymentPDF()
    {
        $payments = Payment::latest()->paginate(5);
          
        $pdf = PDF::loadView('payment/indexPDF',compact('payments'));
    
        return $pdf->download('Customer Payments List.pdf');
    }


}